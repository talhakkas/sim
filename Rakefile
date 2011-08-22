# encoding: utf-8
#  ham servis :
#  sim
#    + apps
#        + foo
#            gui
#            inc
#            index.php
#        + bar
#            gui
#            inc
#            index.php
#    + layouts
#        foo.layout.htm
#        bar.layout.htm
#        layout.htm
#    + public
#        css
#        img
#        js
#    + asset
#    + lib
#    + db
#
# işlenmiş servis(Ör: foo)
#
# + foo
#     gui -> sim/apps/foo/gui
#     inc -> sim/apps/foo/inc
#     index.php sim/apps/index.php
#     layouts -> sim/layouts
#     public -> sim/public
#     asset -> sim/asset
#     lib -> sim/lib
#     db -> sim/db

DEST = "/srv/www/test.omu.edu.tr/site/" # FIXME
PATH = Dir.pwd

APPS = 'apps'
REQUIRE = %w(lib asset public layouts)

require 'highline/import'
require 'x/util/std'
# x/util/std'de bazı ayarlamalar ve hata ayıklamaları yaptım, düzgün çalışması için
# http://github.com/gdemir/x/tree/master/lib/ruby/x/util
# da ki güncellediğim yerleri kendi reponuza ekleyin/düzenleyin.
#
# Ayrıca bu ayarlama sonrası
# https://github.com/gdemir/x/blob/master/bin/git-rdown
# https://github.com/gdemir/x/blob/master/bin/j-page
# programlarınıda kullanılabilirsiniz.

myask = Thor::Shell::Basic.new

task :default do
  Dir["#{APPS}/*"].each do |app|
    request = true
    app = File.basename(app)
    dest_app = "#{DEST}/#{app}"

    info "#{app} servisi hazırlanıyor..."
    if File::exists?("#{dest_app}")
      warning "-    #{app} dizin mevcut!"
      if request = myask.yesno("-    #{app} servisin üzerine yazmak?", "h")
        system "rm -rf #{dest_app}"
        system "mkdir #{dest_app}"
        notice "-    #{app} dizini tekrardan oluşturuldu"
      end
    else
      Dir.mkdir("#{dest_app}")
      ok "-    #{app} dizini olusturuldu"
    end
    if request
      info "-    #{app} servisi için gerekli ortam oluşturuluyor..."
      # gui, inc, index.php
      system "ln -s #{PATH}/#{APPS}/#{app}/* #{dest_app}/"
      # lib, public, layouts, asset
      REQUIRE.each do |r|
        system "ln -s '#{PATH}/#{r}' '#{dest_app}/'"
      end
      ok "-    #{app} servisi kullanılmaya hazır"
    end
  end
end

task :reload => [:clean, :default]

task :clean do
  info "servisler siliniyor"
   Dir["#{APPS}/*"].each do |app|
     app = File.basename(app)
     system "rm -rf #{DEST}/"+File.basename(app)
  end
  ok "servisler silindi"
end
