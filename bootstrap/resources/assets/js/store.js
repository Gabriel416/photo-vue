import Vue from 'vue';
import Vuex from 'vuex';
import gifshot from 'gifshot';

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    gifFrames: []
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
            document.getElementById("photo-preview").appendChild(animatedImage);

            // Save data to sessionStorage
			sessionStorage.setItem('addedToDom', true);

            // document.body.appendChild(animatedImage);
        }
      });
    },
  },

  mutations: {
    setGif: (state, payload) => {
      //set our state here
      state.gifFrames = payload;
    }
  },

  actions: {
    setGif: (context, payload) => {
      //frames are our payload
      var gifFrames = [];
      for (var i = 0; i < payload.length; i++) {
        gifFrames.push('/' + payload[i]);
      }

      //commit mutation
      context.commit('setGif', gifFrames);
    }
  }
})
