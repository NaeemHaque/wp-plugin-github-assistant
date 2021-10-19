<template>
  <div class="__wrapper">
    <el-row>
      <div class=" __image">
        <img :src="data.avatar_url" alt="Avatar" class="center">
      </div>
    </el-row>
    <el-row>
      <div class="information">
        <h1 class="title">
          {{ data.name }}
        </h1>

        <div class="user">
          {{ data.login }}
        </div>
        <div class="bio">
          {{ data.bio }}
        </div>
        <div class="with_icon" v-if="data.company">
          {{ data.company }}
        </div>

        <div class="with_icon"  v-if="data.location">
          {{ data.location }}
        </div>

        <div class="with_icon"  v-if="data.twitter_username">
          {{ data.twitter_username }}
      </div>
      </div>
    </el-row>

    <div class="content_wrapper">
      <el-row :gutter="24" class="card_row">
        <el-col :span="8" class="card_column">
          <router-link :to="'/profile/' + data.login + '/repos'" class="decoration__none">
            <div class="option_item">
              <h1 class="option_title"> Repositories({{ data.public_repos }})</h1>
            </div>
          </router-link>
        </el-col>

        <el-col :span="8" class="card_column">
          <router-link :to="'/profile/' + data.login + '/followers'" class="decoration__none">
            <div class="option_item">
              <h1 class="option_title"> Followers({{ data.followers }})</h1>
            </div>
          </router-link>
        </el-col>

        <el-col :span="8" class="card_column">
          <router-link :to="'/profile/' + data.login + '/following'" class="decoration__none">
            <div class="option_item">
              <h1 class="option_title">Following({{ data.following }})</h1>
            </div>
          </router-link>
        </el-col>
      </el-row>
    </div>
    <el-row :gutter="24" >
      <div class="join_date">
        Join Since: {{ date }}
      </div>
    </el-row>
  </div>
</template>

<script>

import moment from 'moment'
let name

export default {
  props: ['login'],

  data: () => ({
    username: '',
    data: [],
    date: ''
  }),

  created () {
    name = this.login

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
      this.data = res.data
      console.log(this.data)
      this.date = moment(String(res.data.created_at)).format('MM/DD/YYYY')
      console.log(this.date)
    })
    .catch((error) => {
      console.log(error)
    });
  }
}
</script>

<style scoped>
.__wrapper {
  min-height: 500px !important;
  padding: 4% 0;
}


img {
  border-radius: 50%;
}
.center {
  display: block !important;
  margin-left:39% !important;
  padding: 10px;
  max-width: 270px;
  max-height: 270px;

}
.information {
  margin-bottom: 15px;
}
.title {
  color: #fff;
  font-size: 40px;
  text-align: center;
}
.user {
  color: #5F7C8A;
  font-size: 15px;
  text-align: center !important;
  padding-bottom: 5px;
}
.bio {
  color: #5F7C8A;
  font-size: 22px;
  text-align: center !important;
  padding: 10px;
}
.with_icon{
  color: #5F7C8A;
  font-size: 17px;
  text-align: center !important;
  padding: 5px;
}
.content_wrapper {
  max-width: 1000px;
  border: 2px solid slategrey;
  text-align: center;
  margin: 0 auto;
  padding: 20px 10px;
}
.option_item {
  background: none;
  cursor: pointer;
  height: 50px;
  border: 1px solid aliceblue;
}
.option_item:hover {
  background: #262d38;
}
.option_title{
    color: aliceblue;
    font-size: 20px;
}
.join_date {
  color: #5F7C8A;
  font-size: 20px;
  text-align: center !important;
  padding: 5px;
  margin: 10px;
}
.decoration__none {
  text-decoration: none !important;
}

</style>

