<template>
  <div>
    <!-- banner -->
    <hooper
      class="container"
      pagination="yes"
      :infiniteScroll="true"
      :autoPlay="true"
      :playSpeed="5000"
    >
      <slide v-for="slide in rands" :key="slide.id">
        <img
          :src="slide.image1"
          class="img-fluid center"
          style="height:250px; object-fit:cover;"
        />
      </slide>
      <hooper-pagination slot="hooper-addons"></hooper-pagination>
    </hooper>

    <!-- event recomments -->
    <div class="container mt-4">
      <router-link exact to="/event/create">
        <button class="btn btn-main-create w-100">สร้างอีเว้นท์</button>
      </router-link>
      <hr />

      <div class="row">
        <div class="col">
          <h2>อีเว้นท์ <span>แนะนำ</span></h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <hooper class="" :settings="hooperRecomments">
            <slide v-for="recomment in rands" :key="recomment.id">
              <div class="p-2">
                <div class="card p-0 shadow">
                  <div class="imageBoxs w-100">
                    <img
                      :src="recomment.image1"
                      class="img-fluid img-full-center"
                    />
                  </div>
                  <div class="p-2">
                    <div class="title">
                      <h4 class="text-main mb-0">{{ recomment.title }}</h4>
                    </div>
                    <div class="detail mt-2">
                      <div class="d-flex align-items-center">
                        <div class="iconBtn">
                          <img
                            src="/assets/icon/calendar.png"
                            class="img-fluid"
                          />
                        </div>
                        <div class="ml-2">
                          <p class="mb-0">{{ recomment.date_text }}</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="iconBtn">
                          <img src="/assets/icon/time.png" class="img-fluid" />
                        </div>
                        <div class="ml-2">
                          <p class="mb-0">{{ recomment.time_text }}</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="iconBtn">
                          <img src="/assets/icon/pin.png" class="img-fluid" />
                        </div>
                        <div class="ml-2">
                          <p class="mb-0">{{ recomment.map_name }}</p>
                        </div>
                      </div>
                    </div>
                    <div
                      class="mt-4 option d-flex justify-content-between align-items-center"
                    >
                      <div>
                        <h4 class="mb-0">
                          {{ recomment.price_x }}
                          <span class="small">฿/ตั๋ว</span>
                        </h4>
                      </div>
                      <div>
                        <router-link
                          :to="'/event/' + recomment.id"
                          class="btn btn-main"
                          >ซื้อตั๋ว</router-link
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </slide>
          </hooper>
        </div>
      </div>
    </div>

    <!-- news recomments -->
    <div class="container mt-4">
      <div class="row">
        <div class="col">
          <h2>อีเว้นท์ <span>มาใหม่</span></h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <hooper class="" :settings="hooperNews">
            <slide v-for="recomment in events" :key="recomment.id">
              <div class="p-2">
                <div class="card p-0 shadow">
                  <div class="imageBoxs w-100">
                    <img :src="recomment.image1" class="img-full-center" />
                  </div>
                  <div class="p-2">
                    <div class="title">
                      <h4 class="text-main mb-0">{{ recomment.title }}</h4>
                    </div>
                    <div class="detail mt-2">
                      <div class="d-flex align-items-center">
                        <div class="iconBtn">
                          <img
                            src="/assets/icon/calendar.png"
                            class="img-fluid"
                          />
                        </div>
                        <div class="ml-2">
                          <p class="mb-0">{{ recomment.date_text }}</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="iconBtn">
                          <img src="/assets/icon/time.png" class="img-fluid" />
                        </div>
                        <div class="ml-2">
                          <p class="mb-0">{{ recomment.time_text }}</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="iconBtn">
                          <img src="/assets/icon/pin.png" class="img-fluid" />
                        </div>
                        <div class="ml-2">
                          <p class="mb-0">{{ recomment.map_name }}</p>
                        </div>
                      </div>
                    </div>
                    <div
                      class="mt-4 option d-flex justify-content-between align-items-center"
                    >
                      <div>
                        <h4 class="mb-0">
                          {{ recomment.price_x }}
                          <span class="small">฿/ตั๋ว</span>
                        </h4>
                      </div>
                      <div>
                        <router-link
                          :to="'/event/' + recomment.id"
                          class="btn btn-main"
                          >ซื้อตั๋ว</router-link
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </slide>
          </hooper>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Hooper, Slide, Pagination as HooperPagination } from "hooper";
import "hooper/dist/hooper.css";

import { mapGetters, mapActions } from "vuex";
export default {
  middleware: "auth",
  data: function() {
    return {
      // slides: ["images/banner-1.png", "images/banner-2.png"],
      slides: [
        {
          image: "/banner/banner_02.png",
          url: ""
        },
        {
          image: "/banner/banner_03.jpeg",
          url: ""
        }
      ],
      hooperRecomments: {
        infiniteScroll: true,
        autoPlay: true,
        playSpeed: 5000,
        trimWhiteSpace: true,
        itemsToShow: 1.25,
        breakpoints: {
          992: {
            itemsToShow: 4.25
          }
        }
      },
      recomments: [
        {
          id: 1,
          price: 2500,
          image: "/post/01.png",
          url: "",
          title:
            "ICSA Course 2020 by Qten teacher ICSA Course 2020 by Qten teacher ICSA Course 2020 by Qten teacher",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 2,
          price: 2500,
          image: "/post/02.png",
          url: "",
          title: "Music events live in concert 2020",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 3,
          price: 2500,
          image: "/post/03.png",
          url: "",
          title: "5.5 Shopping Day by Robinson",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 4,
          price: 2500,
          image: "/post/04.png",
          url: "",
          title: "Furniture Fare 2020 by IKEA",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 5,
          price: 2500,
          image: "/post/05.png",
          url: "",
          title: "Furmiture Festival 10.10 ตุลาคม",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        }
      ],
      hooperNews: {
        infiniteScroll: true,
        autoPlay: true,
        playSpeed: 3200,
        trimWhiteSpace: true,
        itemsToShow: 1.25,
        breakpoints: {
          992: {
            itemsToShow: 4.25
          }
        }
      }
    };
  },
  methods: {
    ...mapActions({ fetchEvent: "event/fetch" })
  },
  computed: {
    ...mapGetters({ events: "event/events", rands: "event/eventsrans" })
  },
  created() {
    this.fetchEvent();
  },
  components: {
    Slide,
    Hooper,
    HooperPagination
    // Search,
  }
};
</script>

<style type="text/css" scoped>
.imgProfile img {
  width: 120px;
}
.mw-240 {
  max-width: 240px;
}
@media (min-width: 992px) {
  .imgProfile img {
    width: 160px;
  }
}
</style>

<style>
.hooper {
  position: relative;
  box-sizing: border-box;
  width: 100%;
  height: auto !important;
}
.hooper img {
  width: 100%;
}
.btn-main-create {
  width: 300px;
  height: 45px;
  background: var(--color-gradient);
  color: #fff;
  font-size: clamp(12px, 2vw, 14px);
  padding-left: 15px;
  padding-right: 20px;
  padding-top: 4px;
  padding-bottom: 4px;
  border-radius: 20px;
  transition: 0.5s;
  font-size: 22px;
}
.img-full-center {
  width: 100%;
  object-fit: cover;
  height: 180px;
}
</style>
