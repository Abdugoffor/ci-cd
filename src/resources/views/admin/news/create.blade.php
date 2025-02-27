@extends('layouts.admin')
@section('title', getTranslation('news'))
@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Full featured CKEditor</h5>
            </div>

            <div class="card-body">
                <form action="#">
                    <div class="mb-3">
                        <label for="editor-full"></label>
                        <textarea name="editor-full" id="editor-full" rows="2" cols="2">
                            </textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-teal">Submit form <i
                                class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection
