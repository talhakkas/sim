# Kodlama

## Veri yapıları

Düğüm bilgileri `get_node()` işleviyle elde edilebiliyor. Dönüş değeri bir
sözlük veriyapısı ve aşağıdaki genel yapıya sahiptir:

	$node = { nid/cid/id, title/ntype/..., options, opts }

özel olarak `opts` anahtarı düğüm dal seçeneklerini tutar,

	$node['opts'] = { $oid => { link_text/odul/ceza/node_link, response vd } }

Burada `$oid` seçenek id ve `vd` ise dal türüne göre gelen ekstra bilgidir (ör.
`dal` türünde `chkResponse`).

Bunun sıkıştırılmış (`serialize()`) hali `$node['options']` da tutulur.

`$node['opts'][$oid]['response']`, dal türüne göre değişiklik göstermektedir.

#### DRUG - DOSE

**isimlendirme**: `opts` isimlendirmesine dokunulmamış (bir çok yerde isim
takibi sorunuyla karşılaşmamak adına), `response` ismi yerine `drugs`
isimlendirmesi tercih edilmiştir ve `$oid` olmadığından,
`$node['opts']['drugs']` formunu alır (buna kısaca `$dict` diyeceğim),

	$dict = {$did => {name/dmn/dmx/dval/dayol}}

burada `$did` drug id dir (ör. Alphagan adlı ilacın idsi `116` dır). 

**dict:** `$dict` drug düğümünde öntanımlı değerlerle oluşturulur, dose
düğümünde ise kullanıcı tanımlı değerlerle güncellenir.

**dict:** dose düğümünde `$dict` gereksizdir. drug düğümünde ki güncellenir.
Bunun için `$node[parent]` ta drug id tutulur (drug ilk oluşturulduğunda, dose
da oluşturulur ve bu sırada atama yapılır).

**node_link:** Diğer taraftan `node_link` diğer dal türünden farklılık
gösterir. drug düğümünün ardından dose düğümü geleceğinden, sonraki düğüm için
otomatize işler çevrilir. Buna göre drug düğümü ilk kez oluşturulurken dose da
oluşturulur ve `node_link` e bağlanır. dose düğümünde ise `node_link` vardır ve
anlamlıdır.

**senkronizasyon:** drug-dose senkronizasyonu, drug düğümünde edit-update
öncesi/sonrasındaki ilaçlar sözlük üzerinde kontrol edilir. Eğer öncesinde
zaten varsa dokunulmaz (muhtemelen kullanıcı dose değerlerini vs
ayaralamıştır), yoksa eklenir. Öncesinde olup sonrasında (eski ve yeni diye
adlandırdım) olmayanlar ise silinir. Bu amaçla `liste_senkronla()` isminde bir
işlev yazıldı.
