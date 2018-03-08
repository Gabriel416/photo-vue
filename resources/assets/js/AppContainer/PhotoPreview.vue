<template lang="html">
  <main class="splash2">
    <div class="app-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="text-center choice-text-title">{{previewText}}</h1>
            <div class="row">
              <div class="animated-options-wrapper" id="photo-preview">
                <div class="loading-wrapper" v-show="!loaded">
                    <div class="loading-item">
                        <div class="animated-background"></div>
                        <div class="animated-background-sub"></div>
                    </div>
                </div>
                <div class="slider-wrapper text-center row" v-show="loaded">
                  <range-slider
                    class="slider"
                    min="8"
                    :max="this.$store.state.rangeMax"
                    step="8"
                    v-model="sliderValue"
                    @change="updateGifPreview"
                    >
                  </range-slider>
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
import RangeSlider from 'vue-range-slider';
import gifshot from 'gifshot';
// you probably need to import built-in style
import 'vue-range-slider/dist/vue-range-slider.css'
export default {

 data: function () {
    return {
      loaded: false,
      sliderValue: null,
      previewText: 'Loading...'
    }
  },

  components: {
    RangeSlider
  },
    

  mounted() {

    console.log('Component mounted.');

    this.checkIfGifLoaded();
    this.timeLineBackground();
    return this.$store.getters.createInitialGif;

  },

  methods: {
      checkIfGifLoaded() {
        var that = this;
        var interval = setInterval(function() {
              if(that.$store.state.domLoaded === true) {
                that.loaded = true;
                that.previewText = 'Preview';
                clearInterval(interval);
              }
            }, 100)
      },

      timeLineBackground() {
        for (var i = 0; i < this.$store.state.gifFrames.length; i++) {
            var timeLineSelector = document.createElement('img');
            timeLineSelector.src = this.$store.state.gifFrames[i];
            timeLineSelector.className = "timeline-preview";
            document.querySelector(".range-slider-inner").appendChild(timeLineSelector);
        }
      },

      updateGifPreview() {
        var frameCalculation = (this.sliderValue/8) -1;
        frameCalculation *= 8;
        var framesSelected = [];
        for (var i = frameCalculation; i < frameCalculation + 8; i++) {
          framesSelected.push(i);
        }
        this.$store.dispatch('updateGifPreview', framesSelected)
        this.redrawGif();
      },

      redrawGif() {
          this.loaded = false;
          this.previewText = 'Loading...';
          document.querySelector('.gif-preview').remove();
          var that = this;
          gifshot.createGIF({
            'images': [...that.$store.state.selectedFrames]
          }, obj => {
            console.log(obj, 'OBJ');
            if(!obj.error) {
              //IF NO ERROR APPEND IMAGE TO THE DOM
              console.log('NO ERROR');
              var image = obj.image,
              animatedImage = document.createElement('img');
              animatedImage.src = image;
              animatedImage.className = "gif-preview";
              document.getElementById("photo-preview").prepend(animatedImage);
              that.loaded = true;
              that.previewText = 'Preview';
          }
        });
      }
  },


  computed: {
    // mix the getters into computed with object spread operator
    // ...mapGetters([
    //     'createInitialGif',
    //     'redrawGif'
    //   ])

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
    animation-duration: 2s;
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
    animation-duration: 2s;
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

.slider-wrapper {
  padding: 10px;
  width: 100%;
  /*background: rgba(0, 0, 0, 0.3);*/
}

.slider {
  /* overwrite slider styles */
  width: 50%;
  margin: 0 auto;
  height: 50px;
  overflow-y: hidden;
}

.range-slider-rail, .range-slider-fill {
  display: none;
}

.range-slider-knob {
    width: 40px;
    display: block;
    position: absolute;
    top: 50%;
    left: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    height: 100%;
    width: 100px;
    border: 4.5px solid #1BBC9B;
    border-radius: 0;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    background-color: #fff;
    -webkit-box-shadow: 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: 1px 1px rgba(0, 0, 0, 0.2);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    cursor: pointer;
    background: rgba(0,0,0,0.4);
}

.timeline-preview {
  height: 100%;
}

.gif-preview {
  border-radius: 5px;
  margin-bottom: 25px;
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

@media (max-width: 800px) {
  .slider {
  width: 70%;
  }
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

    .slider {
    width: 90%;
  }
}

}

</style>