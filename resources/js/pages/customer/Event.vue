<template>
  <div>
    <div class="container mt-4">
      <div class="row">
        <div class="col">
          <Search />
        </div>
      </div>

      <!-- news recomments -->
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-4" v-for="recomment in events" :key="recomment.id">
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
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Search from "~/components/Search.vue";
import { mapGetters, mapActions } from "vuex";
import { Hooper, Slide, Pagination as HooperPagination } from "hooper";
import "hooper/dist/hooper.css";
export default {
  data: function() {
    return {
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
    ...mapGetters({ events: "event/events" })
  },
  components: {
    Search,
    Slide,
    Hooper,
    HooperPagination
  },
  created() {
    this.fetchEvent();
  }
};
</script>
