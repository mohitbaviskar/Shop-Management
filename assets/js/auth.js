// // add admin cloud function
// const adminForm = document.querySelector(".admin-actions");
// adminForm.addEventListener("submit", (e) => {
//   e.preventDefault();

//   const adminEmail = document.querySelector("#admin-email").value;
//   const addAdminRole = functions.httpsCallable("addAdminRole");
//   addAdminRole({ email: adminEmail }).then((result) => {
//     console.log(result);
//   });
// });

if (window.location.pathname.includes("exibitors.html")) {
  db.collection("displayExhibitors")
    .get()
    .then((querySnapshot) => {
      let data = [];
      querySnapshot.forEach(function (doc) {
        // doc.data() is never undefined for query doc snapshots
        data.push({ id: doc.id, ...doc.data() });
      });
      setupExhibitors(data);
    });
}

if (window.location.pathname.includes("news-article.html")) {
  db.collection("news")
    .get()
    .then((querySnapshot) => {
      let data = [];
      querySnapshot.forEach(function (doc) {
        // doc.data() is never undefined for query doc snapshots
        data.push({ id: doc.id, ...doc.data() });
      });
      setupNews(data);
    });
}

if (window.location.pathname.includes("about-us.html")) {
  db.collection("gallery")
    .orderBy("creationDate", "asc")
    .get()
    .then((querySnapshot) => {
      let data = [];
      querySnapshot.forEach(function (doc) {
        // doc.data() is never undefined for query doc snapshots
        data.push({ id: doc.id, ...doc.data() });
      });
      setupGallery(data);
    });
}

if (window.location.pathname.includes("index.html")) {
  db.collection("sponsors")
    .get()
    .then((querySnapshot) => {
      let data = [];
      querySnapshot.forEach(function (doc) {
        // doc.data() is never undefined for query doc snapshots
        data.push({ id: doc.id, ...doc.data() });
      });
      setupSponsors(data);
    });
}

// listen for auth status changes
auth.onAuthStateChanged((user) => {
  if (!window.location.pathname.includes("sign-up")) {
    if (user) {
      user.getIdTokenResult().then((idTokenResult) => {
        user.admin = idTokenResult.claims.admin;
        setupUI(user);
      });

      db.collection("domestic")
        .doc(user.uid)
        .get()
        .then((doc) => {
          if (doc.exists) {
            setupDomesticForm(doc.data());
          }
        });

      db.collection("international")
        .doc(user.uid)
        .get()
        .then((doc) => {
          if (doc.exists) {
            setupInternationalForm(doc.data());
          }
        });
      db.collection("exhibitors")
        .doc(user.uid)
        .get()
        .then((doc) => {
          if (doc.exists) {
            setupExhibitorForm(doc.data());
          }
        });

      db.collection("chats")
        .doc(user.uid)
        .get()
        .then((doc) => {
          if (doc.exists) {
            setupChat(doc.data());
          } else {
            setupChat();
          }
        });
    } else {
      setupUI();
      db.collection("chats")
        .doc("anonymous")
        .get()
        .then((doc) => {
          if (doc.exists) {
            setupChat(doc.data());
          } else {
            setupChat();
          }
        });
    }
  }
});

// signup
const signupForm = document.querySelector("#signup-form");
if (signupForm) {
  signupForm.addEventListener("submit", (e) => {
    e.preventDefault();

    // get user info
    const email = signupForm["signup-email"].value;
    const password = signupForm["signup-password"].value;

    // sign up the user & add firestore data
    auth
      .createUserWithEmailAndPassword(email, password)
      .then((cred) => {
        cred.user.updateProfile({
          displayName: signupForm["signup-name"].value,
        });

        // alert("h");
        return db.collection("users").doc(cred.user.uid).set({
          name: signupForm["signup-name"].value,
        });
      })
      .then(() => {
        // close the signup modal & reset form
        // const modal = document.querySelector("#modal-signup");
        // M.Modal.getInstance(modal).close();
        window.location.replace("/domestic-form.html");
        signupForm.reset();
        signupForm.querySelector(".error").innerHTML = "";
      })
      .catch((err) => {
        signupForm.querySelector(".error").innerHTML = err.message;
      });
  });
}

// logout
const logout = document.querySelector("#logout");
if (logout) {
  logout.addEventListener("click", (e) => {
    e.preventDefault();
    auth.signOut();
    window.location.replace("/");
  });
}

// login
const loginForm = document.querySelector("#login-form");
if (loginForm) {
  loginForm.addEventListener("submit", (e) => {
    e.preventDefault();

    // get user info
    const email = loginForm["login-email"].value;
    const password = loginForm["login-password"].value;

    // log the user in
    auth
      .signInWithEmailAndPassword(email, password)
      .then((cred) => {
        window.location.replace("/domestic-form.html");

        loginForm.reset();
        loginForm.querySelector(".error").innerHTML = "";
      })
      .catch((err) => {
        loginForm.querySelector(".error").innerHTML = err.message;
      });
  });
}

// login with google
const googleButton = document.querySelector("#signinwithgoogle");
if (googleButton) {
  googleButton.addEventListener("click", (e) => {
    e.preventDefault();

    var provider = new firebase.auth.GoogleAuthProvider();

    auth
      .signInWithPopup(provider)
      .then(function (cred) {
        if (cred.additionalUserInfo.isNewUser) {
          db.collection("users").doc(cred.user.uid).set({
            name: cred.user.displayName,
          });
        }
        window.location.replace("/domestic-form.html");
      })
      .catch(function (error) {
        loginForm.querySelector(".error").innerHTML = error.message;
      });
  });
}

const passwordReset = document.querySelector("#passwordReset");
if (passwordReset) {
  passwordReset.addEventListener("click", (e) => {
    e.preventDefault();

    const resetEmail = loginForm["login-email"].value;
    auth
      .sendPasswordResetEmail(resetEmail)
      .then(function () {
        // Email sent.
        loginForm.querySelector(".error").innerHTML = "";

        loginForm.querySelector(".success").innerHTML =
          "Email is successfully sent.";
      })
      .catch(function (error) {
        // An error happened.
        loginForm.querySelector(".success").innerHTML = "";
        loginForm.querySelector(".error").innerHTML = error.message;
      });
  });
}
