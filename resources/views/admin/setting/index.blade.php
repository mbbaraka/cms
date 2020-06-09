@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-2">
        <div class="row">
            <div class="col">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif

                @if(Session::has('delete-message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('delete-message') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-tabs">
                  <div class="card-header p-2 pt-1">
                    <ul class="nav nav-pills" id="custom-tabs-one-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">View Settings</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Edit Settings</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                      <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                         <div class="row">
                           <div class="col-md-6">
                            <hr>
                             <div class="row">
                               <label class="col-md-4">Logo:</label>
                               <span class="col-md-8">
                                 <img src="{{ $settings->logo }}" class="img-fluid" style="width: 70px; height: 70px">
                               </span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Favicon:</label>
                               <span class="col-md-8">
                                 <img src="{{ $settings->favicon }}" class="img-fluid" style="width: 70px; height: 70px">
                               </span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">SEO Keyword:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->seo_keywords }}</label></label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">SEO Title:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->seo_title }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">SEO Description:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->seo_desc }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Contact:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->contact }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Email:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->email }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Address:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->address }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Google Analytics:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->analytics }}</label></span>
                             </div>
                             <hr>
                           </div>
                           <div class="col-md-6">
                             <div class="row">
                               <label class="col-md-4">Facebook Page:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->facebook_url }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Twitter Page:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->twitter_url }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Youtube Page:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->youtube_url }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Footer Text:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->footer_text }}</label></span>
                             </div>
                             <hr>
                             <div class="row">
                               <label class="col-md-4">Copyright Text:</label>
                               <span class="col-md-8"><label class="text-muted font-italic small font-weight-normal">{{ $settings->copyright_text }}</label></span>
                             </div>
                             <hr>
                           </div>
                         </div>
                      </div>

                       <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                         {!! Form::open(['route' =>  ['settings.update', $settings->id], 'enctype' => 'multipart/form-data', 'method' => 'put']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row form-group @if($errors->has('logo')) has-error @endif">
                                        <div class="row">
                                            <label for="basic-url">Logo</label>
                                              <div class="input-group mb-3 @if($errors->has('logo')) has-error @endif">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text lfm" data-input="logo" data-preview="holder">Upload</span>
                                                </div>
                                                {!! Form::text('logo', $settings->logo, ['class' => 'form-control', 'placeholder' => 'Name', 'id'=>'logo']) !!}
                                                @if ($errors->has('logo'))<span
                                                  class="text-danger">{!! $errors->first('logo') !!}</span>@endif
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <label for="basic-url">Favicon</label>
                                              <div class="input-group mb-3 @if($errors->has('favicon')) has-error @endif">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text lfm" data-input="favicon" data-preview="holder">Upload</span>
                                                </div>
                                                {!! Form::text('favicon', $settings->favicon, ['class' => 'form-control', 'placeholder' => 'Name', 'id'=>'favicon']) !!}
                                                @if ($errors->has('favicon'))<span
                                                  class="text-danger">{!! $errors->first('favicon') !!}</span>@endif
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row form-group @if($errors->has('seo_title')) has-error @endif">
                                        <label class="col-md-5">SEO Title</label>
                                        {!! Form::text('seo_title', $settings->seo_title, ['class' => 'form-control col-md-12', 'placeholder' => 'SEO Title']) !!}
                                        @if ($errors->has('seo_title'))
                                            <span class="text-danger">{!! $errors->first('seo_title') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('seo_keywords')) has-error @endif">
                                        <label class="col-md-4">SEO Keyword</label>
                                        {!! Form::textarea('seo_keywords', $settings->seo_keywords, ['class' => 'form-control col-md-12', 'placeholder' => 'SEO Keywords', 'rows' => 3]) !!}
                                        @if ($errors->has('seo_keywords'))
                                            <span class="text-danger">{!! $errors->first('seo_keywords') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('seo_desc')) has-error @endif">
                                        <label class="col-md-4">SEO Description</label>
                                        {!! Form::textarea('seo_desc', $settings->seo_desc, ['class' => 'form-control col-md-12', 'placeholder' => 'SEO Description', 'rows' => 3]) !!}
                                        @if ($errors->has('seo_desc'))
                                            <span class="text-danger">{!! $errors->first('seo_desc') !!}</span>@endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row form-group @if($errors->has('contact')) has-error @endif">
                                        <label class="col-md-4">Contact</label>
                                        {!! Form::text('contact', $settings->contact, ['class' => 'form-control col-md-8', 'placeholder' => 'Contact']) !!}
                                        @if ($errors->has('contact'))
                                            <span class="text-danger">{!! $errors->first('contact') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('address')) has-error @endif">
                                        <label class="col-md-4">Address</label>
                                        {!! Form::text('address', $settings->address, ['class' => 'form-control col-md-8', 'placeholder' => 'Address']) !!}
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{!! $errors->first('address') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('email')) has-error @endif">
                                        <label class="col-md-4">Email</label>
                                        {!! Form::text('email', $settings->email, ['class' => 'form-control col-md-8', 'placeholder' => 'Email']) !!}
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{!! $errors->first('email') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('analytics')) has-error @endif">
                                        <label class="col-md-4">Google Analytics</label>
                                        {!! Form::text('analytics', $settings->analytics, ['class' => 'form-control col-md-8', 'placeholder' => 'Address']) !!}
                                        @if ($errors->has('analytics'))
                                            <span class="text-danger">{!! $errors->first('analytics') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('facebook_url')) has-error @endif">
                                        <label class="col-md-4">Facebook Url</label>
                                        {!! Form::text('facebook_url', $settings->facebook_url, ['class' => 'form-control col-md-8', 'placeholder' => 'Facebook Url']) !!}
                                        @if ($errors->has('facebook_url'))
                                            <span class="text-danger">{!! $errors->first('facebook_url') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('twitter_url')) has-error @endif">
                                        <label class="col-md-4">Twitter Url</label>
                                        {!! Form::text('twitter_url', $settings->twitter_url, ['class' => 'form-control col-md-8', 'placeholder' => 'Twitter Url']) !!}
                                        @if ($errors->has('twitter_url'))
                                            <span class="text-danger">{!! $errors->first('twitter_url') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('youtube_url')) has-error @endif">
                                        <label class="col-md-4">Youtube Url</label>
                                        {!! Form::text('youtube_url', $settings->youtube_url, ['class' => 'form-control col-md-8', 'placeholder' => 'Youtube Url']) !!}
                                        @if ($errors->has('youtube_url'))
                                            <span class="text-danger">{!! $errors->first('youtube_url') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('footer_text')) has-error @endif">
                                        <label class="col-md-4">Footer Text</label>
                                        {!! Form::text('footer_text', $settings->footer_text, ['class' => 'form-control col-md-8', 'placeholder' => 'Footer Text']) !!}
                                        @if ($errors->has('footer_text'))
                                            <span class="text-danger">{!! $errors->first('footer_text') !!}</span>@endif
                                    </div>
                                    <div class="row form-group @if($errors->has('copyright_text')) has-error @endif">
                                        <label class="col-md-4">Copyright Text</label>
                                        {!! Form::text('copyright_text', $settings->copyright_text, ['class' => 'form-control col-md-8', 'placeholder' => 'Copyright Text']) !!}
                                        @if ($errors->has('copyright_text'))
                                            <span class="text-danger">{!! $errors->first('copyright_text') !!}</span>@endif
                                    </div>
                                    <div class="float-right">
                                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                         </form>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection
