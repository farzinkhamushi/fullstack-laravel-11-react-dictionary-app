@extends('admin.layouts.app')

@section('title')
    Edit synonym
@endsection

@section('content')
    <div class="row my-5">
        <div class="col-md-3">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="mt-2">
                        Edit synonym
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="{{route('admin.synonyms.update',$synonym->id)}}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="mb-3">
                                    <label for="word_id" class="form-label">Word*</label>
                                    <select
                                        class="form-select @error('word_id') is-invalid @enderror"
                                        name="word_id"
                                        id="word_id"
                                    >
                                        <option selected disabled value="">Select one word</option>
                                        @foreach ($words as $word)
                                            <option value="{{$word->id}}"
                                                @selected(old('word_id',$synonym->word_id) == $word->id)
                                                >{{$word->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('word_id')
                                        <div class="invalid-feedback">
                                            <strong> {{ $message }} </strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="similars" class="form-label">Similars*</label>
                                    <input
                                        type="text"
                                        class="form-control @error('similars') is-invalid @enderror"
                                        name="similars"
                                        value="{{old('similars',$synonym->similars)}}"
                                        id="similars"
                                        placeholder="similars*"
                                        data-role="tagsinput"
                                    />
                                    @error('similars')
                                        <div class="invalid-feedback">
                                            <strong> {{ $message }} </strong>
                                        </div>
                                    @enderror
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-dark btn-sm"
                                >
                                Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection