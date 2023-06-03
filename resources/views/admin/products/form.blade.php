<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label>English Name</label>
            <input name="name_en" value="{{ old('name_en', $product->en_name) }}" class="form-control"
                placeholder="English Name" />
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label>Arabic Name</label>
            <input name="name_ar" value="{{ old('name_ar', $product->ar_name) }}" class="form-control"
                placeholder="Arabic Name" />
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label>English Excerpt</label>
            <textarea name="en_excerpt" class="form-control " rows="4">{{ old('en_excerpt', $product->en_excerpt) }}</textarea>
        </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label>Arabic Excerpt</label>
                <textarea name="ar_excerpt" class="form-control " rows="4">{{ old('ar_excerpt', $product->ar_excerpt) }}</textarea>
            </div>


        </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label>English Content</label>
                <textarea id="content" name="en_content" class="form-control " rows="8">{{ old('en_content', $product->en_content) }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label>Arabic Content</label>
                <textarea id="content" name="ar_content" class="form-control " rows="8">{{ old('ar_content', $product->ar_content) }}</textarea>
            </div>
        </div>


        <div class="col-md-12">
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                <img width="100" class="img-thumbnail" src="{{ asset('uploads/' . $product->image) }}">
            </div>
        </div>

        <div class="col-md-12">

            <div class="mb-3">
                <label>price</label>
                <input type="text" name="price" class="form-control">
            </div>
        </div>
        <div class="col-md-12">

            <div class="mb-3">
                <label>Discount</label>
                <input type="text" name="discount" class="form-control">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label>Dealer</label>
            <select class="form-control" name="dealer_id">
                <option value="" selected>Select</option>
                @foreach ($dealers as $item)
                    <option {{ $item->id == $product->dealer_id ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->trans_name }}</option>
                @endforeach
            </select>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js"
        integrity="sha512-sWydClczl0KPyMWlARx1JaxJo2upoMYb9oh5IHwudGfICJ/8qaCyqhNTP5aa9Xx0aCRBwh71eZchgz0a4unoyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content'
        })
    </script>
