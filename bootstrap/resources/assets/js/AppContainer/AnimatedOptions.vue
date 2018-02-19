<template lang="html">
  <main class="splash2">
    <div class="app-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="text-center choice-text-title">Pick an Upload Method Below</h1>
            <div class="row">
              <div class="animated-options-wrapper">
                <div class="option-card text-center dropzone-card">
                  <div class="dropzone-content">
                    <p class="text-center gif-text">Upload Your Gif Here!</p>
                    <p class="text-center image-sub-text">Simply choose an awesome gif and let us work our magic.</p>
                    <i class="fa fa-magic" aria-hidden="true"></i>
                  </div>
                  <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" v-on:vdropzone-success-multiple="getFiles"></vue-dropzone>
                </div>
                <img src="/uploads/frame000.gif" alt="">
                <div class="option-card text-center dropzone-card">
                  <div class="dropzone-content">
                    <p class="text-center gif-text">No Gif? No Problem.</p>
                    <p class="text-center image-sub-text">Just upload two different images, and we'll take care of the rest!</p>
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                  </div>
                  <vue-dropzone ref="myVueDropzone" id="image-dropzone" :options="imageDropzoneOptions"></vue-dropzone>
                </div>
                <div class="option-card text-center dropzone-card">
                  <div class="dropzone-content">
                    <p class="text-center gif-text">Snap or Boomerang</p>
                    <p class="text-center image-sub-text">Select your favorite social media options by clicking here.</p>
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                  </div>
                  <vue-dropzone ref="myVueDropzone" id="social-dropzone" :options="socialDropzoneOptions"></vue-dropzone>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
//DROPZONE
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.css'

export default {

  components: {
    vueDropzone: vue2Dropzone
  },

 data: function () {
    return {
      dropzoneOptions: {
          url: '/api/gif',
          addRemoveLinks: true,
          thumbnailWidth: 150,
          uploadMultiple: true,
          maxFilesize: 500,
          dictDefaultMessage: '',
          acceptedFiles: ".gif",
          headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
      },
      imageDropzoneOptions: {
          url: '/tempimages',
          addRemoveLinks: true,
          thumbnailWidth: 150,
          uploadMultiple: true,
          maxFiles: 2,
          maxFilesize: 500,
          dictDefaultMessage: '',
          acceptedFiles: "image/*",
          headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
      },
      socialDropzoneOptions: {
          url: '/tempimages',
          addRemoveLinks: true,
          thumbnailWidth: 150,
          uploadMultiple: true,
          maxFilesize: 500,
          dictDefaultMessage: '',
          acceptedFiles: "image/gif/.mp4",
          headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
      }
    }
  },
    

  mounted() {
    console.log('Component mounted.');
  },

  methods: {

    getFiles: function(file, response) {
      console.log(file, 'file');
      console.log(response, 'response');
      var frames = response.frames;
      this.$store.dispatch('setGif', frames);
      //change component view here
      this.$router.push({ path: 'preview' });
      // this.createInitialGif(frames);
    },
  },
}

</script>
<style>
  .app-wrapper {
/*  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);*/
  margin-top: 40px;
  width: 90%;
  margin: 0 auto;
  background-color: #ffffff;
  color: #22313F;
  border-radius: 10px;
  -webkit-box-shadow: 0px 0px 12px 5px rgba(0, 0, 0, 0.27);
  -moz-box-shadow: 0px 0px 12px 5px rgba(0, 0, 0, 0.27);
  box-shadow: 0px 0px 12px 5px rgba(0, 0, 0, 0.27);
}

.choice-text-title {
  font-size: 56px;
  color: #22313F;
  margin-top: 30px;
  margin-bottom: 50px;
}

.animated-options-wrapper {
  width: 95%;
  margin-right: auto;
  margin-left: auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  justify-content: space-evenly;
  padding-bottom: 50px;
}

.option-card {
  width: 31%;
  height: 300px;
  position: relative;
  background-color: #ECF0F1;
}

.dropzone-content {
  width: 95%;
  margin-right: auto;
  margin-left: auto;
  color: #22313F;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.gif-text {
  font-size: 35px;
  margin-top: 25px;
  margin-bottom: 20px;
}

.image-sub-text {
  font-size: 18px;
  margin-bottom: 15px;
}

.fa-magic, .fa-picture-o, .fa-video-camera {
  font-size: 85px;
  margin-bottom: 10px;
}

#dropzone, #image-dropzone, #social-dropzone {
  border: 5px dashed #6C7A89;
  padding: 0px;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 2;
  background-color: rgba(0,0,0, 0.0);
  /*padding: 50px 25px;*/
}

.vue-dropzone .dz-preview .dz-remove {
    margin-left: 10px;
}

@media (max-width: 1000px) {
  .option-card {
    width: 90%;
    margin-right: auto;
    margin-left: auto;
    height: 300px;
    position: relative;
    background-color: #ECF0F1;
    margin-bottom: 40px;
}

@media (max-width: 600px) {
  .animated-options-wrapper {
    width: 100%;
  }
}

}

</style>