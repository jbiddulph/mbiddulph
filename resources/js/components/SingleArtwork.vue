<template>
    <div class="content">
        <main class="py-4">
            <div class="container-fluid" id="app">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <div class="grid row">

                                <div class="grid-item">
                                    <a data-fancybox="gallery" data-fancybox-title="artwork.title" :href='"/images/gallery/"+artwork.file'>
                                        <span class="fancybox-title">{{ artwork.title }}</span>
                                        <img :src='"/thumbnail/"+artwork.file' :alt="artwork.file" :title="artwork.title">
                                        {{ artwork.title }}
                                    </a>
                                </div>

                        </div>

                        <div class="row paginate">

                        </div>
                    </div>
                    <div class="col-md-4 col-12 artistinfo">
                        <div style="margin-bottom: 20px;">
                            <a href="https://apps.apple.com/us/app/mbiddulph/id1627696444" target="_blank">
                                <img src="https://melvbiddulph.art/images/old-dog.jpg" width="100%" alt="Download on the app store" />
                            </a>
                        </div>
                        <h2>About Melvyn Biddulph</h2>
                        <ul>
                            <li>BORN IN ROCHDALE 1949</li>
                            <li>ROCHDALE COLLEGE OF ART</li>
                            <li>ST MARTINS SCHOOL OF ART 1964 - 1971</li>
                            <li>EXHIBITED IN 1972</li>
                            <li>SOLO EXHIBITION 2018 - BACK FROM THE DEAD</li>
                        </ul>
                        <p><img src="/images/melvyn.jpg" alt="Melvyn Biddulph - The Artist" width="100%"></p>
                        <p>I think I must have been about 12 when the new art teacher joined the school.</p>
                        <p>Miss Wiggins' hair was blonde, in a beehive style. She wore mini skirts, sometimes with tassels. She would arrive at the school on her cobalt blue Vespa in hairnet and rollers. I think she was the best thing to ever happen to me. She told me I could draw. Got me to go to Saturday morning classes and encouraged me to join the Rochdale College of Art when I left School just before my 15th birthday. She had then, apparently, saved me from a life working in some factory.</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#readMore">
                            Read more
                        </button>
                        <br />
                        <br />
                        <h3>GROSSIC</h3>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/5ZwmCjyZVe0?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        <ul class="contact">
                            <li><i class="fas fa-book"></i>&nbsp;&nbsp;<a href="https://blurb.co.uk/books/1830214-f-r-a-g-i-l-e">F-R-A-G-I-L-E Book</a></li>
                            <li><i class="fab fa-facebook-square"></i>&nbsp;&nbsp;<a href="https://www.facebook.com/melvyn.biddulph">Facebook Profile</a></li>
                            <li><i class="fas fa-phone-square-alt"></i>&nbsp;&nbsp;<a href="tel:07534226701">07534 226701</a></li>
                        </ul>
                        <!-- Modal -->
                        <div class="modal fade" id="readMore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">More about Melvyn</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>I think I must have been about 12 when the new art teacher joined the school.</p>

                                        <p>Miss Wiggins' hair was blonde, in a beehive style. She wore short micro skirts, sometimes with tassels. She would arrive at the school on her cobalt blue Vespa in hairnet and rollers. I think she was the best thing to ever happen to me. She told me I could draw. Got me to go to Saturday morning classes and encouraged me to join the Rochdale College of Art when I left School just before my 15th birthday. She had then, apparently, saved me from a life working in some factory.</p>
                                        <p>I was lucky. Rochdale was thought to be one of the best provincial art colleges. Good tuition combined a traditional approach with acceptance of new ideas, resulting in an impressive pool of students. I enrolled on a one year Prelim course then a two year Pre-Diploma. This gave me experience of a wide range of art disciplines, which was invaluable for my artwork and essential in my life time career.</p>

                                        <p>In 1968 I was accepted directly into St Martin’s School of Art, without any of the academic qualifications normally required, to take a three year degree course in painting.</p>

                                        <p>My time at St. Martin's was both exciting and confusing. It was a time of great change, not only in the arts but also in politics, popular culture, fashion and music. The School was a leader in breaking down traditional boundaries between disciplines. It was here that I studied alongside contemporaries who went on to be successful in a wide range of careers.</p>

                                        <p>The new 'conceptual' thinking in the art world was difficult for me. I looked for alternative approaches in fields such as writing and film making, but I missed my direct way of painting. I missed my background. I didn’t want to invent a painting style or gimmick in order to be 'recognised'.</p>

                                        <p>After obtaining my degree and leaving St Martin’s I needed to support my family. I became a textile designer, and enjoyed a very successful and fruitful career.</p>

                                        <p>However, and most importantly, I never stopped producing personal artwork - privately. A key aspect of this has been my need for artistic freedom:</p>
                                        <ul>
                                            <li>freedom from being classified as a particular type of artist;</li>
                                            <li>freedom to make art based on my own life experiences;</li>
                                            <li>freedom to express myself without feeling limited by ability or technique;</li>
                                            <li>freedom from the demands of commercial galleries or clients to produce a particular kind of work;</li>
                                            <li>freedom from the influence of others’ opinions on my work.</li>
                                        </ul>
                                        <p>After my solo exhibition in 2018 I thought my freedom would be compromised. It hasn't, I still follow my basic approach of never producing art for anyone but myself.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
          data: function() {
              return {
                  artwork: {}
              }
          },
          mounted() {
              this.loadArtwork()
          },
          methods: {
              loadArtwork: function() {
                  //load API
                  axios.get('https://melvbiddulph.art/api/artwork/'+this.$route.params.id)
                  console.log('the ID is: ', this.$route.params.id)
                  .then((response) => {
                      this.artwork = response.data
                      console.log('here we go: ', this.artwork)
                  })
                  .catch( function (error) {
                      console.log(console.log("Here is the errorxx: ",error))
                  })
                  //assign this.artwork
              }
          }
    }
</script>
