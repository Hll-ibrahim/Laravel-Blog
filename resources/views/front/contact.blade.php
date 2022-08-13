
@extends('front.layouts.master')
@section('title', 'İletişim')
@section('bg', 'https://images.pexels.com/photos/5720783/pexels-photo-5720783.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load')

@section('content')
<div class="col-md-8">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif    
    @if($errors->any())   
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <p>Bizimle iletişime geçebilirsiniz. <div class="my-5">
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form method="post" action="{{route('contact.post')}}">
            @csrf
            <div class="my-2">
            <label for="name">Ad Soyad</label>
                <input class="form-control" type="text" value="{{old('name')}}" name="name" />
            </div>
            <div class="my-2">
            <label for="email">Email adresi</label>
                <input class="form-control" name="email" value="{{old('email')}}"  type="email"  />
            </div>
            <div class="my-2">
            <label for="topic">Konu</label>

                <select class="form-control" name="topic">
                  <option value="Bilgi" @if(old('topic')=='Bilgi') selected  @endif>Bilgi</option>
                  <option value="Destek" @if(old('topic')=='Destek') selected  @endif>Destek</option>
                  <option value="Genel" @if(old('topic')=='Genel') selected  @endif>Genel</option>
                </select>
            </div>
            <div class="my-2">
              <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem" >{{old('message')}}</textarea>

                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
            </div>
            <br />
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
            <!-- Submit Button-->
            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
        </form>
    </div>
</div>
<div class="col-md-4">
  asfhsşfhoşs
</div>



@endsection
