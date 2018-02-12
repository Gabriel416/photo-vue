
@extends('layouts.app')
@section('content')
  <div id="app">
  <section class="splash">
    <div class="container-fluid">
      <div class="row">
        <div class="splash-wrapper">
          <h1 class="text-center splash-header">Bring Your Digital Memories to Life</h1>
          <p class="text-center splash-text">Turn your beloved gifs, boomerangs, and apple live photos to tangible moving print photos!</p>
          <div class="button-wrapper">
            <button class="btn learn-more-button" v-on:click="animate">Learn More</button>
            <a class="btn get-started-button mobile-get-started" href="/upload">Get Started</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="about-section">
    <div class="container">
      <div class="about-content">
        <div class="row">
          <div class="about-wrapper text-center">
            <div class="col-xs-12 col-sm-6">
              <h3 class="about-text-title text-center">Ways to Upload</h3>
              <p class="about-text text-left">We can transform your favorite instagram videos, facebook photos and any photos on your computer or phone to print ready photos in seconds. Pretty magical right?</p>
              <a href="/upload" class="btn get-started-button about-get-started">Get Started</a>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="iphone-x">
                <div class="divider"></div>
                <div class="bezel"></div>
                <div class="screen"></div>
                <div class="speaker"></div>
                <div class="camera"></div>
                <div class="button mute"></div>
                <div class="button vol-up"></div>
                <div class="button vol-down"></div>
                <div class="button right"></div>
                <div class="divider"></div>
              </div>
            </div>
          </div>
        </div>
        <!--    <div class="row">
          <div class="col-xs-12">
            <p class="about-text text-center">Our tech will transform your favorite photos to print ready photos in seconds! Pretty magical right?</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-xs-12 text-center">
	        	<div class="col-xs-4">
	        		<img class="integration-icons" src="/images/instagram.png" alt="Instagram Icon">
	        	</div>
        		<div class="col-xs-4">
        			<img class="integration-icons" src="/images/facebook.png" alt="facebook Icon">
        		</div>
        		<div class="col-xs-4">
        			<img class="integration-icons" src="/images/facebook.png" alt="facebook Icon">
        		</div>
        	</div>
        </div> -->
      </div>
    </div>
  </section>
  <section class="example-section">
    <div class="container">
      <div class="example-content">
        <div class="row">
          <div class="example-wrapper text-center">
            <div class="hidden-xs col-sm-6">
              <div class="photo-card">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <h3 class="example-text-title">Hold Memories in Your Hands</h3>
              <p class="example-text text-left">We use lenticular printing to bring your photos to life. With prices starting at $2.99 and free shipping, what's not to love?</p>
              <a href="/upload" class="btn get-started-button example-get-started">Start Uploading!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h4 class="text-center contact-text-title">Contact Us</h4>
          <p class="contact-text">We are more than happy to answer any questions you may have. Fill out the form below and we’ll be in touch as soon as possible.</p>
          <form action="/contact" method="POST" class="text-center">
          	{{csrf_field()}}
            <label class="text-left" for="name">Name</label>
            <input type="text" name="name" required v-model="name">
            <p class="text-left error-text" :style="{ 'color': errorColor }" v-show="nameError">The name field is required</p>
            <label class="text-left" for="email">Email</label>
            <input type="email" name="email" required v-model="email" v-on:keyup="emailSuggestion">
             <p class="text-left error-text" :style="{ 'color': errorColor }" v-show="emailError">The email field is required and must be valid</p>
             <p class="text-left email-check" v-if="didYouMean" v-on:click="replaceEmail" :style="{ 'color': colorSelected }">Did you mean @{{didYouMean}}?</p>
            <label class="text-left" for="message">Message</label>
            <textarea name="message" id="" cols="30" rows="10" required v-model="message"></textarea>
            <p class="text-left error-text" :style="{ 'color': errorColor }" v-show="messageError">The message field is required</p>
            <button type="submit" class="btn submit-button" v-on:click="sendContact" :disabled="disabled">@{{buttonText}}</button>
          </form>
        </div>
      </div>
    </div>
  </section>
 </div>
@endsection

@section('scripts')
  <script src="/js/landing.js"></script>
 @endsection

