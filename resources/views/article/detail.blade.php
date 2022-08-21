@extends('layouts.app')
@section('content')
<div id="article" class="section pb-5 bg-white shadow-sm article-class-page">  
    <div class="column-list border-top-0 pt-5">
      <div class="container">
        <div class="column mb-5">    
          <div class="row">
            <div class="col-md-12">
              <h1 class="title-market mb-3">{{ $results->title }}</h1>
              <div class="img mb-5 text-center">
                <img src="https://zonderstudio.com/moma/public/img/article/{{ $results->image }}" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col-md-12">
              <div class="market-right-wrapper">                    
                <div class="desc-block">
                  <div class="desc">
                    {!! $results->content !!}
                  </div>
                </div>
              </div>
            </div>
          </div>           
        </div>
      </div>
    </div>
  </div>
@Stop