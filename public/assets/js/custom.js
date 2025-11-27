$(document).ready(function () {
    var $html = $("html");

    // 🔹 Check saved language in localStorage
    var savedLang = localStorage.getItem("siteLang") || "en";
    setLanguage(savedLang);

    $("#changeLanguage").on("click", function () {
        var currentLang = $html.attr("lang") === "en" ? "en" : "ar";
        var newLang = currentLang === "en" ? "ar" : "en";

        // 🔹 Save new language
        localStorage.setItem("siteLang", newLang);

        // 🔹 Apply language
        setLanguage(newLang);
    });

    function setLanguage(lang) {
        $html.attr("dir", lang === "ar" ? "rtl" : "ltr");
        $html.attr("lang", lang);

        $("[data-en]").each(function () {
            var $el = $(this);
            var tag = $el.prop("tagName").toLowerCase();

            if (tag === "input" || tag === "textarea") {
                $el.attr("placeholder", $el.data(lang));
            } else {
                $el.text($el.data(lang));
            }
        });

        // 🔹 If you want to update slider RTL setting here:
        if (typeof slider !== "undefined") {
            slider.destroy(); // remove old
            slider = $('#testimonials_caresoul').lightSlider({
                item: 1,
                loop: true,
                slideMargin: 0,
                controls: false,
                rtl: lang === "ar" // 👈 auto switch
            });
        }
    }
});