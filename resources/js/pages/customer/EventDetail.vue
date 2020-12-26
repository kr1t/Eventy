<template>
  <div id="eventPage">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="sticky-top h-full" style="top: 54px">
            <img :src="event.image1" />
          </div>
        </div>
        <div class="col-12 col-lg-6 py-4 pb-4" v-if="event">
          <div class="d-flex justify-content-between">
            <div>
              <h2 class="mb-0">{{ event.title }}</h2>
              <h4><span class="small">by Withcraft</span></h4>
            </div>
            <div>
              <button class="btn btn-main d-flex">
                <div class="iconBtn">
                  <img src="/assets/icon/star.svg" class="img-fluid" />
                </div>
                <p class="mb-0 ml-2">สนใจเข้าร่วม</p>
              </button>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="iconBtn">
              <img src="/assets/icon/calendar.png" class="img-fluid" />
            </div>
            <div class="ml-2">
              <p class="mb-0">{{ event.date_text }}</p>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="iconBtn">
              <img src="/assets/icon/time.png" class="img-fluid" />
            </div>
            <div class="ml-2">
              <p class="mb-0">{{ event.time_text }}</p>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <div class="iconBtn">
              <img src="/assets/icon/pin.png" class="img-fluid" />
            </div>
            <div class="ml-2">
              <p class="mb-0">{{ event.map_name }}</p>
            </div>
          </div>
          <div class="mt-4">
            Tags
            <div class="d-flex tag mt-2">
              <div
                class="btn btn-outline-main"
                v-for="tag in event.tag"
                :key="tag"
              >
                #{{ tag }}
              </div>
            </div>
          </div>
          <div class="mt-4 sticky-top">
            <div class="tabsView">
              <ul>
                <li v-for="tab in tabs" :key="tab.id">
                  <span
                    v-on:click="scrollToTab(tab.target)"
                    v-if="tab.target == tabActive"
                    class="active"
                  >
                    {{ tab.title }}
                  </span>

                  <span v-on:click="scrollToTab(tab.target)" v-else>
                    {{ tab.title }}
                  </span>
                </li>
              </ul>
            </div>
          </div>
          <div class="">
            <div id="event">
              <h4 class="text-main"><strong>ข้อมูลอีเว้นท์</strong></h4>
              <p>
                {{ event.des }}
              </p>
            </div>
            <hr class="w-100" />
            <div id="ticket">
              <h4 class="text-main"><strong>ราคาตั๋ว</strong></h4>
              <p>
                เปิดจองทั้งหมด {{ maxx }} รอบ (1 รอบอยู่ได้สูงสุด 2 ชั่วโมง)
              </p>
              <div
                v-for="ticket in event.tickets"
                :key="ticket.id"
                class="mb-3"
              >
                <p class="mb-1">
                  ราคา : <span class="text-main">{{ ticket.price }} THB</span>
                </p>
                <div v-for="(round, index) in ticket.times" :key="round.id">
                  <label class="checkBoxCustom">
                    <p class="mb-0">
                      รอบที่ {{ index + 1 }} : {{ round.start }} -
                      {{ round.end }}
                    </p>
                  </label>
                </div>
              </div>
              <p class="mb-0">
                ** สามารถลงทะเบียนก่อนเข้างานในรอบของตัวเองได้ก่อน 30 นาที **
              </p>
              <p class="mb-0">
                เปิดจำหน่ายบัตรวันที่ {{ event.date_text }} เวลา
                {{ event.time_text }}
              </p>
            </div>
            <hr class="w-100" />
            <div id="store">
              <h4 class="text-main"><strong>ร้านค้าที่เข้าร่วม</strong></h4>
              <div class="d-flex row">
                <div
                  class="col-4 col-lg-3 mb-4 text-center"
                  v-for="store in stores"
                  :key="store.id"
                >
                  <img :src="store.image" class="img-fluid" />
                  <p class="mb-0 mt-2">{{ store.name }}</p>
                </div>
              </div>
            </div>
            <hr class="w-100" />
            <div id="map">
              <h4 class="text-main"><strong>แผนที่การเดินทาง</strong></h4>
              <div class="d-flex row">
                <div class="col-12">
                  <iframe
                    :src="event.google_map_url"
                    width="600"
                    height="450"
                    frameborder="0"
                    style="border: 0"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0"
                  ></iframe>
                </div>
              </div>
              <div class="d-flex mt-2 align-items-start">
                <div class="iconBtn">
                  <img src="/assets/icon/location.svg" class="img-fluid" />
                </div>
                <div class="ml-2">
                  <p class="mb-0">
                    {{ event.map_name }}
                    <br />
                    {{ event.map_address }}
                  </p>
                </div>
              </div>
              <div class="d-flex mt-2 align-items-start">
                <div class="iconBtn">
                  <img src="/assets/icon/mrt.svg" class="img-fluid" />
                </div>
                <div class="ml-2">
                  <p class="mb-0">MRT: {{ event.mrt }}</p>
                </div>
              </div>
              <div class="d-flex mt-2 align-items-start">
                <div class="iconBtn">
                  <img src="/assets/icon/bus.svg" class="img-fluid" />
                </div>
                <div class="ml-2">
                  <p class="mb-0">รถเมล์: {{ event.bus }}</p>
                </div>
              </div>
              <div class="d-flex mt-2 align-items-start">
                <div class="iconBtn">
                  <img src="/assets/icon/near.svg" class="img-fluid" />
                </div>
                <div class="ml-2">
                  <p class="mb-0">
                    สถานที่ใกล้เคียง : {{ event.near_location }}
                  </p>
                </div>
              </div>
            </div>
            <hr class="w-100" />
            <div id="contact">
              <h4 class="text-main"><strong>ติดต่อ</strong></h4>
              <div class="d-flex row">
                <div class="col-5">
                  <img src="/user/07.svg" class="img-fluid" />
                </div>
                <div class="col-7">
                  <h4>Witchcraft</h4>
                  <div class="d-flex">
                    <div class="iconBtn">
                      <img src="/assets/icon/facebook.svg" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">facebook.com/Witchcraft</p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="iconBtn">
                      <img src="/assets/icon/twitter.svg" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">twitter.com/Witchcraft</p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="iconBtn">
                      <img src="/assets/icon/instagram.svg" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">instagram.com/Witchcraft</p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="iconBtn">
                      <img src="/assets/icon/line.svg" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">Witchcraft</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="height: 60px" class="d-none d-lg-block"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- news recomments -->
    <div
      class="container-fluid"
      style="
        padding-top: 4.5rem;
        padding-bottom: 4.5rem;
        background: linear-gradient(180deg, #fcfcfc 30%, #fff3f0 100%);
      "
    >
      <div class="container">
        <div class="row">
          <div class="col">
            <h2>อีเว้นท์ <span>ที่คล้ายกัน</span></h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <hooper class="" :settings="hooperSetting">
              <slide v-for="recomment in recomments" :key="recomment.id">
                <div class="p-2">
                  <div class="card p-0 shadow">
                    <div class="imageBoxs w-100">
                      <img :src="recomment.image" class="img-fluid" />
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
                            <p class="mb-0">{{ recomment.date }}</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="iconBtn">
                            <img
                              src="/assets/icon/time.png"
                              class="img-fluid"
                            />
                          </div>
                          <div class="ml-2">
                            <p class="mb-0">{{ recomment.time }}</p>
                          </div>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="iconBtn">
                            <img src="/assets/icon/pin.png" class="img-fluid" />
                          </div>
                          <div class="ml-2">
                            <p class="mb-0">{{ recomment.place }}</p>
                          </div>
                        </div>
                      </div>
                      <div
                        class="mt-4 option d-flex justify-content-between align-items-center"
                      >
                        <div>
                          <h4 class="mb-0">
                            {{ recomment.price }}
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
              <hooper-pagination slot="hooper-addons"></hooper-pagination>
            </hooper>
          </div>
        </div>
      </div>
    </div>

    <div class="fixed-bottom priceBottom">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card px-4 py-3 rounded-pill mx-4 border-0 shadow">
              <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-main">ราคา {{ event.price_x }} บาท</h4>
                <router-link :to="`/booth/detail/${id}`" class="btn btn-main">
                  <button class="btn btn-main">จองบูธ</button>
                </router-link>
                <router-link :to="`/event/order/${id}`" class="btn btn-main">
                  <button class="btn btn-main">ซื้อตั๋ว</button>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- component order  -->
    <PurchaseDetails></PurchaseDetails>
  </div>
</template>

<script>
import { Hooper, Slide, Pagination as HooperPagination } from "hooper";
import "hooper/dist/hooper.css";
import PurchaseDetails from "~/components/Events/PurchaseDetails.vue";
import { mapGetters, mapActions } from "vuex";
import { maxBy } from "lodash";
export default {
  computed: {
    ...mapGetters({
      event: "event/event",
    }),
    maxx() {
      if (this.event.tickets) {
        return maxBy(this.event.tickets, "time");
      }
    },
  },
  data: function () {
    return {
      // slides: ["images/banner-1.png", "images/banner-2.png"],
      tabs: [
        {
          title: "ข้อมูลอีเว้นท์",
          target: "event",
        },
        {
          title: "ราคาตั๋ว",
          target: "ticket",
        },
        {
          title: "ร้านค้าที่เข้าร่วม",
          target: "store",
        },
        {
          title: "แผนที่การเดินทาง",
          target: "map",
        },
        {
          title: "ติดต่อ",
          target: "contact",
        },
      ],
      tabActive: "event",
      id: "",
      image: "/post/01.png",
      tickets: [
        {
          price: 100,
          rounds: [
            "10.00 - 11.00",
            "11.00 - 12.00",
            "12.00 - 13.00",
            "13.00 - 14.00",
            "14.00 - 15.00",
            "15.00 - 16.00",
          ],
        },
        {
          price: 150,
          rounds: [
            "10.00 - 11.00",
            "11.00 - 12.00",
            "12.00 - 13.00",
            "13.00 - 14.00",
            "14.00 - 15.00",
            "15.00 - 16.00",
          ],
        },
      ],
      stores: [
        {
          name: "@pspacefreedom",
          image: "/user/01.svg",
        },
        {
          name: "@ttaemtten",
          image: "/user/02.svg",
        },
        {
          name: "@johnnyscookie",
          image: "/user/03.svg",
        },
        {
          name: "@dominiccjj",
          image: "/user/04.svg",
        },
        {
          name: "@pigsabroox",
          image: "/user/05.svg",
        },
        {
          name: "@waris_lyn",
          image: "/user/06.svg",
        },
      ],
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
          place: "Impact Exhibition Hall 5",
        },
        {
          id: 2,
          price: 2500,
          image: "/post/02.png",
          url: "",
          title: "Music events live in concert 2020",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5",
        },
        {
          id: 3,
          price: 2500,
          image: "/post/03.png",
          url: "",
          title: "5.5 Shopping Day by Robinson",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5",
        },
        {
          id: 4,
          price: 2500,
          image: "/post/04.png",
          url: "",
          title: "Furniture Fare 2020 by IKEA",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5",
        },
        {
          id: 5,
          price: 2500,
          image: "/post/05.png",
          url: "",
          title: "Furmiture Festival 10.10 ตุลาคม",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5",
        },
      ],
      hooperSetting: {
        infiniteScroll: true,
        autoPlay: true,
        playSpeed: 3200,
        trimWhiteSpace: true,
        itemsToShow: 1.25,
        breakpoints: {
          992: {
            itemsToShow: 4.25,
          },
        },
      },
    };
  },
  created: function () {
    this.id = this.$route.params.id;
    this.show(this.id);
    this.image = "/post/0" + this.id + ".png";
  },
  methods: {
    scrollToTab: function (target) {
      this.tabActive = target;
      window.$("html, body").animate(
        {
          scrollTop: window.$("#" + target).offset().top - 100,
        },
        500
      );
    },
    ...mapActions({ show: "event/show" }),
    buyTicket() {
      this.$rounter;
    },
  },
  components: {
    Slide,
    Hooper,
    HooperPagination,
    PurchaseDetails,
  },
};
</script>

<style>
.priceBottom {
  opacity: 1;
}
</style>
