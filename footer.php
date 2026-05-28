<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.glass-action-rail{
    position:fixed;
    right:18px;
    bottom:24px;
    z-index:999999;
    display:flex;
    flex-direction:column;
    gap:10px;
}

.glass-action{
    width:118px;
    height:42px;
    border-radius:16px;
    display:flex;
    align-items:center;
    gap:9px;
    padding:0 12px;
    color:#fff;
    text-decoration:none;
    font-size:12px;
    font-weight:900;
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,.32);
    box-shadow:0 14px 35px rgba(15,23,42,.28);
    position:relative;
    overflow:hidden;
    transition:.35s ease;
}

.glass-action::before{
    content:"";
    position:absolute;
    top:-60%;
    left:-40%;
    width:45px;
    height:120px;
    background:rgba(255,255,255,.35);
    transform:rotate(25deg);
    animation:glassShine 3s infinite;
}

.glass-action i{
    width:28px;
    height:28px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:rgba(255,255,255,.22);
    font-size:15px;
}

.glass-action:hover{
    transform:translateX(-8px) scale(1.05);
}

.whatsapp{background:linear-gradient(135deg,rgba(34,197,94,.95),rgba(6,95,70,.95));}
.call{background:linear-gradient(135deg,rgba(37,99,235,.95),rgba(8,145,178,.95));}
.enquiry{background:linear-gradient(135deg,rgba(249,115,22,.95),rgba(147,51,234,.95));}

@keyframes glassShine{
    0%{left:-60%;}
    45%,100%{left:130%;}
}

@media(max-width:576px){
    .glass-action-rail{
        right:12px;
        bottom:14px;
    }

    .glass-action{
        width:42px;
        height:42px;
        padding:0;
        justify-content:center;
        border-radius:50%;
    }

    .glass-action span{
        display:none;
    }
}
    </style>
</head>
<body>
    <footer class="igs-footer">
    <div class="igs-footer-glow"></div>
    <div class="igs-container igs-footer-grid">
        <div>
            <a href="home" class="igs-footer-logo">
                <span class="igs-logo-mark"><img src="images/IG_logo.jpeg" alt=""></span>
                <span>
                    <strong>Indira Gandhi Garden</strong>
                    <small>School Chandrapur</small>
                </span>
            </a>
<p class="igs-footer-text text-sm leading-6 text-justify max-w-xs" style="word-spacing:0;">
    A professional learning campus focused on discipline, creativity, digital learning, sports, values and future-ready education.
</p>

<div class="iconss flex gap-8">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>

        <div>
            <h4>Quick Links</h4>
            <a href="about">About School</a>
            <a href="academics">Academics</a>
            <a href="admission">Admission</a>
            <a href="gallery">Gallery</a>
        </div>

        <div>
            <h4>Useful Pages</h4>
            <a href="privacy-policy">Privacy Policy</a>
            <a href="terms-service">Terms Of Service</a>
            <a href="refund-policy">Refund Policy</a>
            <a href="shipping-policy">Shipping Policy</a>
        </div>

     <div class="space-y-4 max-w-sm">

    <h4 class="text-2xl font-bold text-white mb-5">
        Contact
    </h4>

    <div class="flex items-start gap-3">
        <i class="fa-solid fa-location-dot text-blue-400 mt-1"></i>
        <p class="text-slate-300 leading-7">
            Indira Gandhi Garden School,<br>
            Datala Rd, Ramnagar,<br>
            Chandrapur, Maharashtra 442401
        </p>
    </div>

    <div class="flex items-center gap-3">
        <i class="fa-solid fa-phone text-blue-400"></i>
        <p class="text-slate-300">
            +91 7775883933
        </p>
    </div>

    <div class="flex items-center gap-3 break-all">
        <i class="fa-solid fa-envelope text-blue-400"></i>
        <p class="text-slate-300">
            indiragandhigardenschool2023@gmail.com
        </p>
    </div>

    <div class="flex items-center gap-3">
        <i class="fa-solid fa-medal text-blue-400"></i>
        <p class="text-slate-300 font-medium">
            CBSE AFF. No. 1130291
        </p>
    </div>

</div>
    </div>

    <div class="igs-copyright">
        <p>© <?php echo date('Y'); ?> Indira Gandhi School Chandrapur. All Rights Reserved.</p>
    </div>
</footer>

<div class="igs-popup" id="igsPopup">
    <div class="igs-popup-card">
        <button class="igs-popup-close" id="igsPopupClose">×</button>
        <span class="igs-popup-badge">Admissions Open</span>
        <h3>Start Your Child’s Bright Future</h3>
        <p>Admission enquiry for the new academic session is now open. Limited seats available.</p>
        <a href="admission">Enquire Now</a>
    </div>
</div>
<div class="glass-action-rail">

    <a href="https://wa.me/917775883933?text=Hello%20Indira%20Gandhi%20Garden%20School,%20I%20want%20brochure%20details." target="_blank" class="glass-action whatsapp">
        <i class="fa-brands fa-whatsapp"></i>
        <span>WhatsApp</span>
    </a>

    <a href="tel:+917775883933" class="glass-action call">
        <i class="fa-solid fa-phone-volume"></i>
        <span>Call</span>
    </a>

    <a href="admission" class="glass-action enquiry">
        <i class="fa-solid fa-graduation-cap"></i>
        <span>Enquiry</span>
    </a>

</div>

<script src="js/main.js"></script>
</body>
</html>
