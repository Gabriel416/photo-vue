import Vue from 'vue';
import Vuex from 'vuex';
import gifshot from 'gifshot';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    gifFrames: [],
    selectedFrames: [],
    rangeMax: '',
    domLoaded: false
  },

  getters: {
    createInitialGif: state => {
      console.log(state, 'VUEX STATE');
      	var that = this;
        gifshot.createGIF({
          'images': [...state.gifFrames]
        }, obj => {
          console.log(obj, 'OBJ');
          if(!obj.error) {
            //IF NO ERROR APPEND IMAGE TO THE DOM
            console.log('NO OBJ ERROR');
            var image = obj.image,
            animatedImage = document.createElement('img');
            animatedImage.src = image;
            animatedImage.className = "gif-preview";
            document.getElementById("photo-preview").prepend(animatedImage);
            store.commit('domLoaded', true);
        }
      });
    },
  },

  mutations: {
    setGif: (state, payload) => {
      //set our state here
      state.gifFrames = payload;
        var frameArray = state.gifFrames;
        var lastIndex = frameArray[frameArray.length - 1];
        var rangeMax = frameArray.indexOf(lastIndex) + 1;
        state.rangeMax = rangeMax;
    },

    domLoaded: (state, payload) => {
      state.domLoaded = payload;
    },

    setSelectedFrames: (state, payload) => {
      state.selectedFrames = payload;
    }
  },

  actions: {
    setGif: (context, payload) => {
      //frames is our payload
      var gifFrames = [];
      for (var i = 0; i < payload.length; i++) {
        gifFrames.push('/' + payload[i]);
      }

      //commit mutation
      context.commit('setGif', gifFrames);
    },

    updateGifPreview: (context, payload) => {
      //selectedFrames is our payload
      const newFrameArray = payload.map((selectedFrame) => {
          return store.state.gifFrames[selectedFrame]
      });

      //commit mutation
      context.commit('setSelectedFrames', newFrameArray)
    }
  }
})




