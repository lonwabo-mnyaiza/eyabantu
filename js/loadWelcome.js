/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

document.write('<scr'+'ipt type="text/javascript" src="js/jquery.js" ></scr'+'ipt>');
var lang;

function getWelcome() {
    lang = getLanguage();
    if (!lang || !phrases[lang]) {
        lang = 'nl';
    }
    document.getElementById('welcome').innerHTML = phrases[lang];
    
}

 function getLanguage() {

         if (navigator.language) {
             lang = navigator.language;
         } else if (navigator.userLanguage) {
             lang = navigator.userLanguage;
         }

         if (lang && lang.length > 2) {
             lang = lang.substring(0, 2);
         }

         return lang;
     }

var phrases = { /* translation table for page */
    en: ["<h1>Welcome</h1><p>Eya Bantu your Partner in power - Eya Bantu, established in 1999,\n\
        is a South African based premium consulting company, providing consulting services in the Energy sector.\n\
        We offer a comprehensive range of tailored consultancy solutions including Project Management,\n\
        Renewable Energy, Engineering and Design, Power System Studies, Tendering, Construction Supervision\n\
        and Advisory Services like Energy Policies, Audits and Due Diligence.\n\</p>\n\
        <p><a href='about.html' class='btn btn-primary btn-large'>Learn more &raquo;</a></p>"]   
};


