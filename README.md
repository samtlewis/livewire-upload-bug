## Livewire Upload Bug

1. Clone the repo
2. Run `composer install`
3. Run `npm install`
4. Run `npm run dev`
5. Add your AWS credentials to the `.env` file
6. Run `php artisan serve`
7. Visit the test site
8. Upload a file without a curly apostrophe in the filename
9. You'll see the temporary file shown on the page and the temporaryURL printed below it.
9. Upload a file with a curly apostrophe in the filename
10. You won't see the temporary file shown on the page.
11. If you try to view the temporaryURL, you'll see an error.

```xml
<Error>
<Code>InvalidArgument</Code>
<Message>Header value cannot be represented using ISO-8859-1.</Message>
<ArgumentName>response-content-disposition</ArgumentName>
<ArgumentValue>attachment; filename="’placeholder’-image-600x225!.png"</ArgumentValue>
<RequestId>REDACTED</RequestId>
<HostId>REDACTED</HostId>
</Error>
```

### Potential Solution
Simple URL encode the filename when setting the ResponseContentDisposition header in the `TemporaryUploadedFile` class.

```php
if ((FileUploadConfiguration::isUsingS3() or FileUploadConfiguration::isUsingGCS()) && ! app()->runningUnitTests()) {
            return $this->storage->temporaryUrl(
                $this->path,
                now()->addDay()->endOfHour(),
                ['ResponseContentDisposition' => 'attachment; filename="' . urlencode($this->getClientOriginalName()) . '"']
            );
        }
```

