<template>

 <div class="__wrapper ">
   <Toolbar />
    <router-view></router-view>
   <Footer />
 </div>


</template>

<script>
import Toolbar from "./component/Toolbar";
import Footer from "./component/Footer";

export default {
  name: 'App',

  data: () => ({
    //
  }),

  components: {
    Toolbar,
    Footer
  }
};
</script>

<style scoped>
.__wrapper {
  background: #1C2128;
}
</style>