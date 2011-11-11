# Kodlama

## Veri yapıları

Düğüm bilgileri `get_node()` işleviyle elde edilebiliyor. Dönüş değeri bir sözlük
veriyapısı ve aşağıdaki genel yapıya sahiptir:

	$node = {
				nid/cid/id,
				title/ntype/...,
				options,
				opts
			}

özel olarak `opts` anahtarı düğüm dal seçeneklerini tutar,

	$node['opts'] = {
						$oid =>
							{
								link_text/odul/ceza/node_link,
								response
								vd
							}
					}

Burada `$oid` seçenek id ve `vd` ise dal türüne göre gelen ekstra bilgidir (ör. `dal` türünde
`chkResponse`).

Bunun sıkıştırılmış (`serialize()`) hali `$node['options']` da tutulur.

`$node['opts'][$oid]['response']`, dal türüne göre değişiklik göstermektedir.

#### DRUG - DOSE

`$oid` olmadığından, `$node['opts']['response']` formunu alır (buna kısaca `$dict` diyeceğim),

	$dict = {$did => {name/dmn/dmx/dval/dayol}}

burada `$did` drug id dir (ör. Alphagan adlı ilacın idsi `116` dır). Bu `$dict` drug düğümünde 
öntanımlı değerlerle oluşturulur, dose düğümünde ise kullanıcı tanımlı değerlerle güncellenir.

dose düğümünde `$dict` gereksizdir. drug düğümünde ki güncellenir. Bunun için `$node[parent]` ta
drug id tutulur (drug ilk oluşturulduğunda, dose da oluşturulur ve bu sırada atama yapılır).

Diğer taraftan `node_link` diğer dal türünden farklılık gösterir. drug düğümünün ardından dose
düğümü geleceğinden, sonraki düğüm için otomatize işler çevrilir. Buna göre drug düğümü ilk kez 
oluşturulurken dose da oluşturulur ve `node_link` e bağlanır. dose düğümünde ise `node_link` 
vardır ve anlamlıdır.
