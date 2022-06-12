<template>
    <div class="content qr-codes">
        <div class="grid-item" v-for="artwork in artworks" :key="artwork.id">
            <img :src='"/images/qrcode/"+artwork.id+".png"' :alt="artwork.title" :title="artwork.title">
            <p><strong>{{ artwork.id }}: </strong>{{ artwork.title  }}</p>
        </div>
    </div>
</template>

<script>
    export default {
          data: function() {
              return {
                  artworks: []
              }
          },
          mounted() {
              this.loadArtwork()
          },
          methods: {
              loadArtwork: function() {
                  //load API
                  axios.get('https://melvynbiddulph.co.uk/api/artwork')
                  .then((response) => {
                      this.artworks = response.data
                  })
                  .catch( function (error) {
                      console.log(console.log("Here is the error ZZ: ",error))
                  })
                  //assign this.artwork
              }
          }
    }
</script>
