<template lang="html">
  <main class="splash2">
    <div class="app-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="text-center choice-text-title">Preview</h1>
            <div class="row">
              <div class="animated-options-wrapper" id="photo-preview">
                <div class="loading-wrapper" v-show="!loaded">
                    <div class="loading-item">
                        <div class="animated-background"></div>
                        <div class="animated-background-sub"></div>
                    </div>
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

//GETTERS
import { mapGetters } from 'vuex';
export default {

 data: function () {
    return {
      loaded: false
    }
  },
    

  mounted() {

    console.log('Component mounted.');

    this.checkIfGifLoaded();



  },

  methods: {
      checkIfGifLoaded() {
      var that = this;
      // Get saved data from sessionStorage
      var data = sessionStorage.getItem('addedToDom');
      console.log(data, 'SESSION STORAGE')

          var interval = setInterval(function() {
            if (data == "true") {
              console.log(data, 'IF TRUE SESSION STORAGE')
              console.log('true')
              that.loaded = true;
              clearInterval(interval);
              // Remove all saved data from sessionStorage
               sessionStorage.clear();
            }
          }, 100)
      }
  },


  computed: {
    // mix the getters into computed with object spread operator
    ...mapGetters([
      'createInitialGif'
    ])
    // initialGif() {
    //   return this.$store.getters.createInitialGif;
    // }
  }
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

.loading-wrapper {
  width: 100%;
}

.loading-item {
    background: #fff;
    border-color: #e5e6e9 #dfe0e4 #d0d1d5;
    border-radius: 3px;
    padding: 12px;

    margin: 0 auto;
    /*max-width: 472px;*/
    min-height: 250px;
    width: 50%;
}

@keyframes placeHolderShimmer{
    0%{
        background-position: -468px 0
    }
    100%{
        background-position: 468px 0
    }
}

.animated-background {
    border-radius: 10px;
    animation-duration: 1s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: #f6f7f8;
    background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    background-size: 800px 104px;
    height: 325px;
    position: relative;
}

.animated-background-sub {
    border-radius: 10px;
    animation-duration: 1s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: placeHolderShimmer;
    animation-timing-function: linear;
    background: #f6f7f8;
    background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    height: 30px;
    position: relative;
    margin-top: 25px;
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

  .animated-background {
    height: 200px;
  }

  .loading-item {
    width: 65%;
  }
}

}

</style>