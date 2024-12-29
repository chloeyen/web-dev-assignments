#!/usr/bin/ruby -wT

require 'cgi'
cgi = CGI.new("html5")

city = cgi['city']
province = cgi['province&state']
country = cgi['country']
url = cgi['url']

city = city.split.map(&:capitalize).join(' ')
province = province.split.map(&:capitalize).join(' ')
country = country.split.map(&:capitalize).join(' ')

cgi.out {
  cgi.html {
    cgi.head {
              cgi.title { "City Info" } + 
              cgi.style { "body {margin: 0;}
                          .header {padding: 10px; text-align: center; font-size: 5em; color: white; background-color: #2c3e50; }
                          img {display: block; width: 100%; height: auto;}" }
              } +
    cgi.body { 
      cgi.div(class: 'header') {province.empty? ? "#{city}, #{country}" : "#{city}, #{province}, #{country}" } +
      cgi.img(src: url, alt: "Image of #{city}")
    }  
  }
}
