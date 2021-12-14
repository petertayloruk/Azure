#This code snipit will get the name of an image, including who made it.
#Ubuntu images are made by Canonical

$location = Get-AzLocation | select displayname | Out-GridView -PassThru -Title "Choose a location"
$publisher = Get-AzVMImagePublisher -Location $location.DisplayName | Out-GridView -PassThru -Title "Choose a publisher"
$offer = Get-AzVMImageOffer -Location $location.DisplayName -PublisherName $publisher.PublisherName | Out-GridView -PassThru -Title "Choose an offer"
$title = "VM SKUs for {0} {1} {2}" -f $location.DisplayName, $publisher.PublisherName, $offer.Offer
$sku = Get-AzVMImageSku -Location $location.DisplayName -PublisherName $publisher.PublisherName -Offer $offer.Offer | select SKUS | Out-GridView -Title $title -PassThru
$imageReference = @{ publisher = $publisher.PublisherName; offer = $offer.Offer; sku = $sku.Skus; version = "latest" }
$imageReference | ConvertTo-Json -Depth 4