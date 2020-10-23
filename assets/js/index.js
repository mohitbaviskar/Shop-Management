// DOM elements
const guideList = document.querySelector(".guides");
const loggedOutLinks = document.querySelectorAll(".logged-out");
const loggedInLinks = document.querySelectorAll(".logged-in");
const accountDetails = document.querySelector(".account-details");
const adminItems = document.querySelectorAll(".admin");
const authenticatedForm = document.querySelectorAll("#form");

const domesticFormCard = document.querySelector("#profile_domesticForm");
const internationalFormCard = document.querySelector(
  "#profile_internationalForm"
);
const exhibitorFormCard = document.querySelector("#profile_exhibitorForm");

const formAlert = document.querySelectorAll(".form-alert");

const chatContainer = document.querySelector(".mesgs");
const chatHistoryContainer = document.querySelector(".msg_history_container");

const exhibitorsDisplay = document.querySelector("#display-exhibitors");
const newsAndArticles = document.querySelector("#news-articles");

const galleryCollections = document.querySelector("#collectionButtons");
const galleryCollectionPhotos = document.querySelector("#collectionPhotos");

const sponsors = document.querySelector("#sponsorsRow");

const setupUI = (user) => {
  if (user) {
    // toggle user UI elements
    loggedInLinks.forEach((item) => (item.style.display = "block"));
    loggedOutLinks.forEach((item) => (item.style.display = "none"));
    if (
      window.location.pathname.includes("log-in") ||
      window.location.pathname.includes("sign-up") ||
      window.location.pathname.includes("domestic-form") ||
      window.location.pathname.includes("international-form") ||
      window.location.pathname.includes("exibition-form")
    )
      window.location.replace("/profile.html");
  } else {
    // clear account info
    // accountDetails.innerHTML = "";
    // toggle user elements
    // adminItems.forEach((item) => (item.style.display = "none"));
    loggedInLinks.forEach((item) => (item.style.display = "none"));
    loggedOutLinks.forEach((item) => (item.style.display = "block"));

    // if (
    //   !window.location.pathname.includes("log-in") &&
    //   !window.location.pathname.includes("sign-up")
    // )
    //   window.location.replace("/log-in.html");

    // authenticatedForm.forEach((item) => (item.style.display = "none"));
    // $("#signupModal").modal("toggle");
  }
};

const setupDomesticForm = (data) => {
  if (data) {
    if (domesticFormCard) {
      domesticFormCard.style.display = "block";
      let status = "Pending";
      if (data.status === "approve") {
        status = "Approved";
      }
      domesticFormCard.querySelector(".status").innerHTML =
        "Status: <strong>" + status + "</strong>";
      domesticFormCard.querySelector(".email").innerHTML =
        "Email: " + data.companyEmail;
    }
    if (window.location.pathname.includes("domestic-form")) {
      formAlert.forEach((item) => (item.style.display = "block"));
    }
  }
};

const setupInternationalForm = (data) => {
  if (data) {
    if (internationalFormCard) {
      internationalFormCard.style.display = "block";
      internationalFormCard.querySelector(".status").innerHTML =
        "Status: " + data.status;
      internationalFormCard.querySelector(".email").innerHTML =
        "Email: " + data.companyEmail;
    }
    if (window.location.pathname.includes("international-form")) {
      formAlert.forEach((item) => (item.style.display = "block"));
    }
  }
};

const setupExhibitorForm = (data) => {
  if (data) {
    if (exhibitorFormCard) {
      exhibitorFormCard.style.display = "block";
      exhibitorFormCard.querySelector(".status").innerHTML =
        "Status: " + data.status;
      exhibitorFormCard.querySelector(".email").innerHTML =
        "Email: " + data.email;
    }
    if (window.location.pathname.includes("exibition-form")) {
      formAlert.forEach((item) => (item.style.display = "block"));
    }
  }
};

const setupChat = (data) => {
  if (data) {
    let html = "";

    data.messages.forEach((message) => {
      if (message.sender === "admin") {
        html += `
      <div class="incoming_msg">
        <div class="incoming_msg_img">
          <img
            src="/assets/img/support.png"
            alt="support"
          />
        </div>
        <div class="received_msg">
          <div class="received_withd_msg">
            <p>${message.content}</p>
            <span class="time_date">${new Date(
              message.timestamp
            ).toDateString()}</span>
          </div>
        </div>
      </div>
      `;
      }
      if (message.sender === "user") {
        html += `
          <div class="outgoing_msg">
            <div class="sent_msg">
              <p>${message.content}</p>
              <span class="time_date">${new Date(
                message.timestamp
              ).toDateString()}</span>
            </div>
          </div>
        `;
      }
    });
    chatHistoryContainer.querySelector(".msg_history").innerHTML = html;
    chatContainer.style.display = "block";
  } else {
    chatHistoryContainer.style["justify-content"] = "center";
    chatHistoryContainer.style["text-align"] = "center";
    chatHistoryContainer.innerHTML = `<p style="font-size: 32px; color: #555;">No Messages.</p>`;
    chatContainer.style.display = "block";
  }
};

const setupExhibitors = (data) => {
  let html = "";
  data.forEach((exhibitor) => {
    html += `
    <div class="col-sm-6 col-md-6 col-lg-4">
        <!-- Team Item Starts -->
        <div
          class="team-item wow fadeInUp animated"
          data-wow-delay="0.2s"
          style="
            visibility: visible;
            -webkit-animation-delay: 0.2s;
            -moz-animation-delay: 0.2s;
            animation-delay: 0.2s;
          "
        >
          <div class="team-img">
            <img
              class="img-fluid img-sz"
              src="${exhibitor.logoUrl}"
              alt=""
            />
            
            <div class="team-overlay">
              <div class="overlay-social-icon text-center">
                <ul class="social-icons">
                ${
                  exhibitor.facebookUrl
                    ? `<li>
                      <a href="${exhibitor.facebookUrl}">
                        <i class="lni-facebook-filled" aria-hidden="true"></i>
                      </a>
                    </li>`
                    : ``
                }
                ${
                  exhibitor.twitterUrl
                    ? `<li>
                    <a href="${exhibitor.twitterUrl}"
                      ><i class="lni-twitter-filled" aria-hidden="true"></i
                    ></a>
                  </li>`
                    : ``
                }

                ${
                  exhibitor.linkedInUrl
                    ? `<li>
                  <a href="${exhibitor.linkedInUrl}"
                    ><i class="lni-linkedin-filled" aria-hidden="true"></i
                  ></a>
                </li>`
                    : ``
                }
                  
                ${
                  exhibitor.behanceUrl
                    ? `<li>
                  <a href="${exhibitor.linkebehanceUrldInUrl}"
                    ><i class="lni-behance" aria-hidden="true"></i
                  ></a>
                </li>`
                    : ``
                }
                </ul>
              </div>
            </div>
          </div>
          <div class="info-text">
            <h3><a href="${exhibitor.siteLink}">${exhibitor.director}</a></h3>
            <p>${exhibitor.firmName}</p>
          </div>
        </div>
        <!-- Team Item Ends -->
      </div>
      `;
  });

  exhibitorsDisplay.innerHTML = html;
};

const setupNews = (data) => {
  let html = "";

  data.forEach((news) => {
    html += `
    <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="blog-item">
            <div class="blog-image">
                <a href="#">
                    <img class="img-fluid" src="${news.imgUrl}" alt="">
                </a>
            </div>
            <div class="descr">
                <div class="tag">${news.tag.toUpperCase()}</div>
                <h3 class="title">
                    <a href="https://giionline.com/advances-in-gem-diamond-detection-technology-2019/">
                        ${news.title}
                    </a>
                </h3>
                <div class="meta-tags">
                    <span class="date">${new Date(
                      news.date
                    ).toDateString()}</span>
                    <span class="comments">| <a href="#">${
                      news.publisher
                    }</a></span>
                </div>
            </div>
        </div>
    </div>
    
    `;
  });

  newsAndArticles.innerHTML = html;
};

const setupGallery = (data) => {
  let html = "";
  let html2 = "";

  html += ` <button class="btn btn-default filter-button" data-filter="all">
  All
</button>`;
  data.forEach((collection) => {
    html += `
    <button class="btn btn-default filter-button" data-filter="${collection.name
      .toLowerCase()
      .replace(" ", "")}">
      ${collection.name}
    </button>
    `;
    collection.photos.forEach((photo) => {
      html2 += `
      <div
      class="gallery_product col-lg-3 col-md-4 col-sm-4 col-xs-6 filter ${collection.name
        .toLowerCase()
        .replace(" ", "")}"
    >
      <img src="${photo}" />
    </div>

      `;
    });
  });

  galleryCollections.innerHTML = html;
  galleryCollectionPhotos.innerHTML = html2;

  $(document).ready(function () {
    $(".filter-button").click(function () {
      var value = $(this).attr("data-filter");

      if (value == "all") {
        //$('.filter').removeClass('hidden');
        $(".filter").show("1000");
      } else {
        //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
        //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter")
          .not("." + value)
          .hide("3000");
        $(".filter")
          .filter("." + value)
          .show("3000");
      }
    });

    if ($(".filter-button").removeClass("active")) {
      $(this).removeClass("active");
    }
    $(this).addClass("active");
  });
};

const setupSponsors = (data) => {
  let html = "";
  data.forEach((sponsor) => {
    html += `
    <div class="col-md-3">
    <div class="spnsors-logo">
      <a href="${sponsor.siteLink}">
        <img
          src="${sponsor.logoUrl}"
          alt="Image"
          style="max-width: 100%;"
        />
      </a>
    </div>
  </div>
      `;
  });

  sponsors.innerHTML = html;
};

$(".msg_send_btn").click(() => {
  var user = auth.currentUser;

  const content = $("input.write_msg").val();
  let html = "";
  if (chatHistoryContainer.querySelector(".msg_history")) {
    html = chatHistoryContainer.querySelector(".msg_history").innerHTML;
  }

  html += `
  <div class="outgoing_msg">
    <div class="sent_msg">
      <p>${content}</p>
      <span class="time_date"> ${new Date(Date.now()).toDateString()}</span>
    </div>
  </div>`;

  if (chatHistoryContainer.querySelector(".msg_history")) {
    chatHistoryContainer.querySelector(".msg_history").innerHTML = html;
  } else {
    chatHistoryContainer.innerHTML = `<div class="msg_history"></div>`;
    chatHistoryContainer.querySelector(".msg_history").innerHTML = html;
  }
  $("input.write_msg").val("");
  if (user) {
    db.collection("chats")
      .doc(user.uid)
      .get()
      .then((doc) => {
        if (doc.exists) {
          db.collection("chats")
            .doc(user.uid)
            .update({
              adminUnread: true,
              messages: firebase.firestore.FieldValue.arrayUnion({
                content,
                sender: "user",
                timestamp: Date.now(),
              }),
            })
            .then(() => {})
            .catch((err) => {
              alert(err.message);
              console.log(err.message);
            });
        } else {
          db.collection("chats")
            .doc(user.uid)
            .set({
              displayName: user.displayName ? user.displayName : "Unknown",
              adminUnread: true,
              messages: firebase.firestore.FieldValue.arrayUnion({
                content,
                sender: "user",
                timestamp: Date.now(),
              }),
            })
            .then(() => {})
            .catch((err) => {
              alert(err.message);
              console.log(err.message);
            });
        }
      });
  } else {
    db.collection("chats")
      .doc("anonymous")
      .get()
      .then((doc) => {
        if (doc.exists) {
          db.collection("chats")
            .doc("anonymous")
            .update({
              adminUnread: true,
              messages: firebase.firestore.FieldValue.arrayUnion({
                content,
                sender: "user",
                timestamp: Date.now(),
              }),
            })
            .then(() => {})
            .catch((err) => {
              alert(err.message);
              console.log(err.message);
            });
        } else {
          db.collection("chats")
            .doc("anonymous")
            .set({
              displayName: "Anonymous",
              adminUnread: true,
              messages: firebase.firestore.FieldValue.arrayUnion({
                content,
                sender: "user",
                timestamp: Date.now(),
              }),
            })
            .then(() => {})
            .catch((err) => {
              alert(err.message);
              console.log(err.message);
            });
        }
      });
  }
});

// setup guides
// const setupGuides = (data) => {
//   if (data.length) {
//     let html = "";
//     data.forEach((doc) => {
//       const guide = doc.data();
//       const li = `
//         <li>
//           <div class="collapsible-header grey lighten-4"> ${guide.title} </div>
//           <div class="collapsible-body white"> ${guide.content} </div>
//         </li>
//       `;
//       html += li;
//     });
//     guideList.innerHTML = html;
//   } else {
//     guideList.innerHTML = '<h5 class="center-align">Login to view guides</h5>';
//   }
// };

// setup materialize components
// document.addEventListener("DOMContentLoaded", function () {
//   var modals = document.querySelectorAll(".modal");
//   M.Modal.init(modals);

//   var items = document.querySelectorAll(".collapsible");
//   M.Collapsible.init(items);
// });
