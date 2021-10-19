<template>
  <div class="__wrapper">
    <el-aside width="30%">
      <el-row>
        <div class=" __image">
          <img :src="user.avatar_url" alt="Avatar" class="center">
        </div>
      </el-row>
      <el-row>
        <div class="information">
          <h1 class="title">
            {{  user.name }}
          </h1>

          <div class="user">
            {{ user.login }}
          </div>
          <div class="bio">
            {{ user.bio }}
          </div>
          <div class="with_icon"  v-if="user.company">
            {{ user.company }}
          </div>

          <div class="with_icon"  v-if="user.location">
            {{ user.location }}
          </div>

          <div class="with_icon" v-if="user.twitter_username">
            {{ user.twitter_username }}
          </div>
        </div>
      </el-row>
    </el-aside>
    <el-main>
      <div class="search_result_wrapper">
        <h1 class="result_title">{{ user.followers }}  Followers</h1>

        <el-row :gutter="24" class="card_row">
          <el-col :span="11" class="card_column" v-for="item in data" :key="item.login">
            <router-link  :to="'/profile/' + item.login" class="decoration__none">
              <el-card shadow="always" class="search--item">
                <div class="search__results">
                  <div class="block">
                    <el-avatar :size="50" :src="item.avatar_url"></el-avatar>
                  </div>
                  <h1 class="username">{{ item.login }}</h1>
                </div>
              </el-card>
            </router-link>
          </el-col>

        </el-row>

      </div>
    </el-main>
  </div>
</template>


<script>

export default {
  props: ['login'],

  data: () => ({
    username: '',
    data: [],
    user: []
  }),
  computed: {

  },

  created () {
    const name = this.login

    jQuery.ajax({
      type: "post",
      dataType: "json",
      url: ajaxurl,
      data: {
        action:'user_follower',
        user: name,
        nonce: githubasistant.g_nonce
      }
    })
     .then((res) => {
        this.data = res.data
     })
     .catch((error) => {
       console.log(error)
     });


    jQuery.ajax({
      type: "post",
      dataType: "json",
      url: ajaxurl,
      data: {
        action:'user_information',
        user: name,
        nonce: githubasistant.g_nonce
      }
    })
    .then(res => {
      this.user = res.data
    })
    .catch((error) => {
       console.log(error)
    });
  }
}
</script>



<style scoped>
.__wrapper {
  display: flex;
}
.el-aside {
  background: none;
  color: aliceblue;
  padding: 20px;
  border-right: 1px solid #2D333B;
  margin: 20px 0;
}

.el-main {
  background: none;
  color: aliceblue;
  text-align: center;
}


img {
  border-radius: 50%;
  max-width: 200px;
  max-height: 200px;
}
.center {
  display: block !important;
  margin-left:23% !important;
  padding: 10px;

}
.information {
  margin-bottom: 15px;
}
.title {
  color: #fff;
  font-size: 30px;
  text-align: center;
}
.user {
  color: #fff;
  font-size: 12px;
  text-align: center !important;
  padding: 5px;
}
.bio {
  color: #fff;
  font-size: 17px;
  text-align: center !important;
  padding: 5px;
}
.with_icon{
  color: #fff;
  font-size: 18px;
  text-align: center !important;
  padding: 5px;
}



.search_result_wrapper {
  max-width: 900px;
  border: 2px solid slategrey;
  text-align: center;
  margin: 0 auto;
  padding: 20px 0;
}
.search__results {
  display: flex;
  align-items: center;
}
.result_title {
  color: aliceblue;
  font-weight: bold;
  font-size: 25px;
}
.username {
  margin-left: 10px;
  color: aliceblue;
}
.card_row {
  margin-left: 20px !important;
}
.card_column {
  margin: 10px!important;
}
.search--item {
  background: #262d38 !important;
}
.search--item:hover {
  cursor: pointer;
  background: #2e3844de !important;
}

.decoration__none {
  text-decoration: none !important;
}

</style>