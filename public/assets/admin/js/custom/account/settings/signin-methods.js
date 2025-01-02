"use strict";
var KTAccountSettingsSigninMethods = {
  init: function () {
    var t, e;
    !(function () {
      var t = document.getElementById("kt_signin_email"),
        e = document.getElementById("kt_signin_email_edit"),
        n = document.getElementById("kt_signin_password"),
        o = document.getElementById("kt_signin_password_edit"),
        i = document.getElementById("kt_signin_email_button"),
        s = document.getElementById("kt_signin_cancel"),
        r = document.getElementById("kt_signin_password_button"),
        a = document.getElementById("kt_password_cancel");

      i.querySelector("button").addEventListener("click", function () {
        l();
      }),
        s.addEventListener("click", function () {
          l();
        }),
        r.querySelector("button").addEventListener("click", function () {
          d();
        }),
        a.addEventListener("click", function () {
          d();
        });

      var l = function () {
          t.classList.toggle("d-none"),
            i.classList.toggle("d-none"),
            e.classList.toggle("d-none");
        },
        d = function () {
          n.classList.toggle("d-none"),
            r.classList.toggle("d-none"),
            o.classList.toggle("d-none");
        };
    })();
  },
};

KTUtil.onDOMContentLoaded(function () {
  KTAccountSettingsSigninMethods.init();
});
