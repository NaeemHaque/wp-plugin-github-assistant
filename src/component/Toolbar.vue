<<template>
<div class="__wrapper">
  <el-header>
    <router-link to="/" class="decoration__none ">
      <div class="toolbar__content">
        <div class="__logo">
<!--          <img src='../../images/github-logo-white.png' alt="">-->
          <img src="http://localhost/ninja-academy/wp-content/plugins/github-assistant/images/github-logo-white.png" alt="">
        </div>
        <h2 class="toolbar__title">Github Assistant</h2>
      </div>
    </router-link>
  </el-header>

</div>
</template>

<script>
export default {
  name: "Toolbar",
  data() {
    return {
    }
  }
}
</script>

<style scoped>
.decoration__none {
  text-decoration: none;
}
.el-header{
  background-color: #2D333B;
  color: #333;
  height: 80px !important;
}
.__logo img{
  max-height: 45px;
  max-width: 45px;
}
.toolbar__content {
  display: flex;
  align-items: center;
}
.toolbar__title {
  text-align: center;
  color: #ffffff;
  margin-left: 10px;
  font-size: 30px;
}
</style>