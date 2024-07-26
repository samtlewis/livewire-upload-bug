<div style="text-align:center;margin: 40px;">
    @if(!$uploadedImage)
        <div class="">Upload an Image</div>
    @else
        <img src="{{ $uploadedImage->temporaryUrl() }}" style="border: 1px solid black; width:100px !important; height: auto;margin:auto;" alt=""/>
        <div style="font-size:11px;">{{ $uploadedImage->temporaryUrl() }}</div>
    @endif

    <input type="file" wire:model="uploadedImage" id="upload" />

</div>
