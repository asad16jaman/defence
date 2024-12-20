<div class="mb-3">
    <label for="">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $edit ?  $course->name : ""  }}" id="" class="form-control @error('name') is-invalid @enderror">
    @error('name')
    <div class="mt-1 text-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
    <label for="">Author</label>
    
    
    <select name="author" id="" class="form-control @error('author') is-invalid @enderror">
    <option value="">Select Instructor</option>
    
        @foreach ($instructors as $inst)
            <option value="{{ $inst->id }}" @selected(old('author')== $inst->id || $inst->id == $course->user_id ) >{{ $inst->name}}</option>
        @endforeach
    </select>
    @error('author')
    <div class="mt-1 text-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
    <label for="">Duration</label>
    <input type="text" name="duration" value="{{ old('duration') ?? $edit ?  $course->duration : ""  }}" id="" class="form-control @error('duration') is-invalid @enderror">
    @error('duration')
    <div class="mt-1 text-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
    <label for="">Original Price</label>
    <input type="text" name="price" value="{{ old('price') ?? $edit ?  $course->price : ""  }}" id="" class="form-control">
</div>
<div class="mb-3">
    <label for="">Selling Price</label>
    <input type="text" name="sell_price" value="{{ old('sell_price') ?? $edit ?  $course->sell_price : ""  }}" id="" class="form-control">
</div>
<div class="mb-3">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ old('description') ?? $edit ?  $course->description : ""  }}</textarea>
</div>
<div class="mb-3">
    <label for="">Thumbnail</label>
    <input  type="file" name="img" id="" class="form-control">
    <!-- file_exists(asset() -->
    @if($edit && $course->thum )

        <img class="mt-2" src="{{ asset('storage').'/'.$course->thum }}" width="100px" alt="">
    @endif
    
    
</div>