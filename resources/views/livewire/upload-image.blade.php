<div style="text-align:center;margin: 40px;">
    @if(!$uploadedImage)
        <div class="">Upload an Image</div>
    @else
        <img src="{{ $uploadedImage->temporaryUrl() }}" style="border: 1px solid black; width:200px !important; min-height:50px; height: auto;margin:auto;" alt=""/>
        <div style="max-width: 400px; font-size:11px;margin: 20px auto;">{{ $uploadedImage->temporaryUrl() }}</div>
    @endif

    <input type="file" wire:model="uploadedImage" id="upload" />

</div>
