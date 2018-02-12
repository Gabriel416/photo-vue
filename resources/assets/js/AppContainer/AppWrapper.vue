<template lang="html">
  <div>
    <keep-alive>
      <component 
        v-on:storeFiles="sendFiles($event)" 
        v-on:changeComponent="updateComponent($event)" 
        v-on:createCollection="createCollection($event)" 
        v-on:updateFiles="updateCollection($event)"
        v-on:deleteCollection="deleteCollection($event)" 
        v-on:deletePhoto="deletePhoto($event)" 
        v-on:editCollectionName="editCollectionName($event)" 
        v-on:beginUploadingPhotos="beginUploadingPhotos($event)"
        v-bind:is="component" 
        v-bind:collections="collections" 
        v-bind:project="project" 
        v-bind:client="client"
        v-bind:isClient="isClient"
        v-bind:canToggle="canToggle"
        v-bind:canEdit="canEdit"  
      >
      </component>
    </keep-alive>
    <keep-alive>
      <LoadingSpinner v-bind:loading="loading"></LoadingSpinner>
    </keep-alive>
  </div>
</template>
<script>

//import child components here

// import survey from "../components/Survey.vue";
// import upload from "../components/Upload.vue";
// import collection from "../components/Collection.vue";
// import collectionContainer from '../components/shared/CollectionContainer.vue';
// import LoadingSpinner from '../components/shared/LoadingSpinner.vue';


export default {
  //components go here
  components: {
    // survey: survey,
    // upload: upload,
    // collection: collection,
    // collectionContainer,
    // LoadingSpinner
  },

  data() {
    return {
        test: ''
    };
  },


  mounted() {
    console.log('parent mounted');

}