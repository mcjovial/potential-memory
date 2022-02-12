@extends('layouts.admin')

@section('content')

            <div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Add New Post') }} <a class="add-btn" href="{{route('admin-vendor-index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
                      <ul class="links">
                        <li>
                          <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li><a href="javascript:;">{{ __('Vendor') }}</a></li>
                        
                        <li>
                          <a href="{{ route('admin-vendor-subscription-index',$vendor->id) }}">{{ __('Vendor Renew Subscription') }}</a>
                        </li>
                      </ul>
                  </div>
                </div>
              </div>

              <div class="add-product-content1">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area ">
                        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                        @include('includes.admin.form-both')  
                      
                        
                          <div class="my-3">
                            <p><strong> {{__('Vendor Name')}}</strong> : {{$vendor->owner_name}}</p>
                            <p> <strong> {{__('Shop Name')}}</strong> : {{$vendor->shop_name}}</p>
                            <p><strong> {{__('Shop Number')}}</strong> : {{$vendor->shop_number}}</p>
                            <p><strong> {{__('Shop Address')}}</strong> : {{$vendor->shop_address}}</p>
                          </div>
                    
                     
                        <form id="geniusform" action="{{route('admin-vendor-subscription-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Subscription Plan') }}*</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <select name="plan_id" required="">
                                  <option value="">{{ __('Select Subscription Plan') }}</option>
                                    @foreach($datas as $data)
                                    <option value="{{ $data->id }}" {{ isset($last_plan->subscription_id) && $data->id == $last_plan->subscription_id ? 'selected' : ''}}>{{ $data->title }} {{ isset($last_plan->subscription_id) && $data->id == $last_plan->subscription_id ? ' (Current Plan)' : ''}}</option>
                                    @endforeach
                                </select>
                          </div>
                        </div>

                    

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Create Post') }}</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection



