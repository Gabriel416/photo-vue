<template>
<main class="splash2">
  <div class="app-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <div class="choice-wrapper">
            <h1 class="text-center choice-text-title">Choose a Print of Your Choice</h1>
            <div class="row">
              <div class="product-wrapper">
                <div class="product-card text-center">
                  <router-link to="/animated" class="router-link">
                    <p class="text-center card-title">Animated</p>
                    <div class="underline"></div>
                    <div class="product-image">
                      
                    </div>
                    <p class="text-center product-sub-text">Starting at</p>
                    <p class="text-center product-price">$6.99</p>
                    <a href="#" class="btn product-button">SHOP NOW</a>
                  </router-link>
                </div>
                 <div class="product-card text-center">
                  <router-link to="/animated" class="router-link">
                    <p class="text-center card-title">Standard</p>
                    <div class="underline"></div>
                    <div class="product-image">
                      
                    </div>
                    <p class="text-center product-sub-text">Starting at</p>
                    <p class="text-center product-price">$2.99</p>
                    <a href="#" class="btn product-button">SHOP NOW</a>
                  </router-link>
                </div>
              </div>
            </div>
      <!--       <h1 class="text-center choice-text-title">Standard Prints</h1>
            <div class="row">
              <div class="col-xs-12">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="option-wrapper">
                  <img class="option-image animated-square" src="/images/animated-square.jpg" alt="">
                    <p class="text-left option-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam aperiam culpa perspiciatis animi assumenda voluptas, perferendis officiis iure, ad quaerat excepturi saepe praesentium vel, tenetur deserunt? Accusamus eligendi, fugiat expedita!</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="option-wrapper">
                 <img class="option-image animated-square" src="/images/animated-square.jpg" alt="">
                    <p class="text-left option-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam aperiam culpa perspiciatis animi assumenda voluptas, perferendis officiis iure, ad quaerat excepturi saepe praesentium vel, tenetur deserunt? Accusamus eligendi, fugiat expedita!</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="option-wrapper">
                  <img class="option-image animated-square" src="/images/animated-square.jpg" alt="">
                    <p class="text-left option-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam aperiam culpa perspiciatis animi assumenda voluptas, perferendis officiis iure, ad quaerat excepturi saepe praesentium vel, tenetur deserunt? Accusamus eligendi, fugiat expedita!</p>
                    </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</template>
<script>
export default {
  mounted() {
    console.log('Component mounted.')
  }
}

</script>
<style lang="css">
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

.choice-wrapper {
  padding: 20px;
}

.choice-text-title {
  font-size: 56px;
  color: #22313F;
  margin-top: 30px;
  margin-bottom: 50px;
}

.option-wrapper {
  cursor: pointer;
}

.option-image {
    height: 300px;
    width: 100%;
    border-radius: 10px;
}

.option-text {
    padding-top: 20px;
    padding-bottom: 20px;
    letter-spacing: 1px;
    font-size: 18px;
}

.product-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  justify-content: space-evenly;
}

.product-card {
  color: #fff;
  width: 400px;
  height: auto;
  background-image: linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
  -webkit-box-shadow: -11px 10px 16px 1px rgba(0, 0, 0, 0.16);
  -moz-box-shadow: -11px 10px 16px 1px rgba(0, 0, 0, 0.16);
  box-shadow: -11px 10px 16px 1px rgba(0, 0, 0, 0.16);
  transition: 0.3s ease;
  border-radius: 10px;
  margin-bottom: 20px;
}

.product-card:nth-child(2) {
  background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
}

.product-card:hover {
  cursor: pointer;
   transform: translatey(-5px);
}

.card-title {
  margin-top: 20px;
  font-size: 28px;
}

.product-sub-text {
  font-size: 18px;
  margin: 15px 0px;
}

.product-price {
  font-size: 40px;
  margin-bottom: 20px;
}

.product-button {
  border-radius: 25px;
  font-size: 20px;
  padding: 8px 50px;
  background-color: #fff;
  color: #22313F;
  margin-bottom: 30px;
}

.underline {
  height: 3px;
  width: 40%;
  margin: 5px auto;
  border-radius: 40px;
  background: #fff;
}

.router-link {
  color: #fff;
  text-decoration: none;
}

.router-link:active, .router-link:hover, .router-link:focus {
  color: #fff;
  text-decoration: none;
}

@media screen and (max-width: 700px) {
  .app-wrapper {
    width: 98%;
  }
}

</style>
