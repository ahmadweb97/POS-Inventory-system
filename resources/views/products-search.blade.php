@extends('layouts.admin')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="py-5">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Search Results</h1>
                        <hr>
                        @if ($searchProducts->count() > 0)
                        <div class="row">
                            @foreach ($searchProducts as $product)
                              <div class="col-sm-6 col-md-4">
                                <div class="thumbnail" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                                  <img style="height: 200px; width: 100%" src="{{ $product->photo }}" alt="{{ $product->name }}">
                                  <div class="caption">
                                    <h4>{{ $product->name }}</h4>
                                    <p>{{ Illuminate\Support\Str::limit($product->description, $limit = 20, $end = '...') }}</p>
                                    <p>{{ $product->category_name }}</p>
                                    <span> <a href="{{ url('view-product/'.$product->id) }}">view details</a></span>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                          </div>

                        @else
                            <p>No results found.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                {{ $searchProducts->appends(request()->input())->links('pagination::bootstrap-4') }}
                <!-- Display pagination in buttons -->
                <div class="btn-group" role="group">
                    @if ($searchProducts->currentPage() > 1)
                    <a href="{{ $searchProducts->previousPageUrl() }}" class="btn btn-pink m-r-5">Previous</a>
                @endif
                    @if ($searchProducts->hasMorePages())
                        <a href="{{ $searchProducts->nextPageUrl() }}" class="btn btn-pink">Next</a>
                    @endif
                </div>
            </div>

          </div>
    </div>
</div>




@endsection
