<div>
    <!-- Images -->
    <input type="file" name="images[]" multiple/>
        
    @error('images')
        <small class="text-red-500 font-semibold">*{{ $message }}</small>
    @enderror
</div>
