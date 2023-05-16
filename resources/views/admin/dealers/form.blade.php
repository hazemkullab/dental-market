<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label>English Name</label>
            <input name="name_en" value="{{ old('name_en',$dealer->en_name) }}" class="form-control" placeholder="English Name" />
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label>Arabic Name</label>
            <input name="name_ar" value="{{ old('name_ar',$dealer->ar_name) }}" class="form-control" placeholder="Arabic Name" />
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label>English Excerpt</label>
            <textarea name="en_excerpt" class="form-control " rows="4">{{ old('en_excerpt',$dealer->en_excerpt) }}</textarea>
        </div>

        <div class="col-md-12">
            <div class="mb-3">
            <label>Arabic Excerpt</label>
            <textarea name="ar_excerpt" class="form-control " rows="4">{{ old('ar_excerpt',$dealer->ar_excerpt) }}</textarea>
        </div>


    </div>

    <div class="col-md-12">
            <div class="mb-3">
                <label>English Content</label>
                <textarea id="content" name="en_content" class="form-control " rows="8">{{ old('en_content',$dealer->en_content) }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
                <div class="mb-3">
                    <label>Arabic Content</label>
                    <textarea id="content" name="ar_content" class="form-control " rows="8">{{ old('ar_content',$dealer->ar_content) }}</textarea>
                </div>
            </div>

        <div class="col-md-12">
                <div class="mb-3">
                    <label>Image</label>
                     <input type="file" name="image" class="form-control">
                     <img width="100" class="img-thumbnail" src="{{ asset(('uploads/'.$dealer->image)) }}">
                </div>
            </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <option value="" selected>Select</option>
                @foreach ($categories as $item)
                <option {{ ($item-> id == $dealer->category_id ? 'selected': '' ) }} value="{{ $item->id }}">{{ $item->trans_name }}</option>
                @endforeach
            </select>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js"
        integrity="sha512-sWydClczl0KPyMWlARx1JaxJo2upoMYb9oh5IHwudGfICJ/8qaCyqhNTP5aa9Xx0aCRBwh71eZchgz0a4unoyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
                selector:'textarea#content'
            })
    </script>
