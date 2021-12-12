<template>
    <section class="popolari">
        <div class="container">
            <div class="box">
                <img src="images/image-res/res-2.jpg" alt="">
                <h5>Ristorante uno</h5>
            </div>
            <div class="box">
                <img src="images/image-res/res-3.jpg" alt="">
                <h5>Ristorante uno</h5>
            </div>
            <div class="box">
                <img src="images/image-res/res-4.jpg" alt="">
                <h5>Ristorante uno</h5>
            </div>
            <div class="box">
                <img src="images/image-res/res-6.jpg" alt="">
                <h5>Ristorante uno</h5>
            </div>
            
        </div>
    </section>
</template>

<script>
export default {
    name: "Slider",
}
</script>

<style lang="scss" scoped>

.popolari {
    height: 100%;
    height: 70%;
    position: absolute;
    left: 50%;
    bottom: 5;
    display: flex;
    align-items: flex-end;
    transform: translateX(-50%);
}

.container {
  display: flex;
  width: 100%;
  padding: 4% 2%;
  padding: 0% 2%;
  box-sizing: border-box;
  height: 100%;
  height: 85%;
}

.box {
  flex: 1;
  overflow: hidden;
  transition: .5s;
  margin: 0 2%;
  box-shadow: 0 20px 30px rgba(0,0,0,.1);
  line-height: 0;
  z-index: 10;
  text-align: center;
  border: 0.3px solid rgb(228, 228, 228);
  // border-top-left-radius: 30px;
  border-bottom-right-radius: 30px;
  background: rgb(255, 255, 255);
}

.box > img {
  width: 200%;
  height: calc(100% - 10vh);
  height: 60%;
  object-fit: cover; 
  transition: .5s;
}

.box > h5 {
  font-size: 20px;
  display: block;
  text-align: center;
  height: 10vh;
  line-height: 2.6;
}

.box:hover { flex: 1 1 50%; }
.box:hover > img {
  width: 100%;
  height: 100%;
}


@media screen and (max-width: 575px) {
.popolari {
    height: 80%;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.container {
  display: flex;
  width: 100%;
  padding: 4% 2%;
  box-sizing: border-box;
  height: 100%;
}

.box {
  flex: 1;
  overflow: hidden;
  transition: .5s;
  margin: 0 2%;
  box-shadow: 0 20px 30px rgba(0,0,0,.1);
  line-height: 0;
  z-index: 10;
  text-align: center;
  border: 0.3px solid rgb(228, 228, 228);
  border-top-left-radius: 0px;
  border-bottom-right-radius: 20px;
  background: rgb(255, 255, 255);
  width: 100px;
}

.box > img {
  width: 400%;
  height: calc(100% - 10vh);
  height: 60%;
  object-fit: cover; 
  transition: .5s;
}

.box > h5 {
  font-size: 8px;
  display: block;
  text-align: center;
  height: 0;
  line-height: 2.6;
}

.box:hover { flex: 1 1 50%; }
.box:hover > img {
  width: 100%;
  height: 100%;
}

}


@media screen and (min-width:320px) and (max-width:736px) and (orientation:landscape) {

  .popolari {
    height: 80%;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.container {
  display: flex;
  width: 100%;
  padding: 4% 2%;
  box-sizing: border-box;
  height: 100%;
}

.box {
  flex: 1;
  overflow: hidden;
  transition: .5s;
  margin: 0 2%;
  box-shadow: 0 20px 30px rgba(0,0,0,.1);
  line-height: 0;
  z-index: 10;
  text-align: center;
  border: 0.3px solid rgb(228, 228, 228);
  border-top-left-radius: 0px;
  border-bottom-right-radius: 20px;
  background: rgb(255, 255, 255);
  width: 100px;
  height: 40px;
}

.box > img {
  width: 400%;
  height: calc(100% - 10vh);
  height: 40%;
  object-fit: cover; 
  transition: .5s;
}

.box > h5 {
  font-size: 10px;
  display: block;
  text-align: center;
  height: 0;
  line-height: 2.6;
}

.box:hover { flex: 1 1 50%; }
.box:hover > img {
  width: 100%;
  height: 100%;
}

}
</style>
