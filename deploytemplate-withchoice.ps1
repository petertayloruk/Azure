#menu choice function
function Show-Menu
{
    param (
        [string]$Title = 'My Menu',
        [string]$firstchoice = 'first choice',
        [string]$secondchoice = 'second choice'
    )
    Clear-Host
    Write-Host "================ $Title ================"
    
    Write-Host "$firstchoice - Press '1' for this option."
    Write-Host "$secondchoice - Press '2' for this option."
    Write-Host "Q: Press 'Q' to quit."
}

#############################################################
#   code starts here, everything above is for function(s)   #
#############################################################

#connect to azure account
#Connect-AzAccount

#menu choice for resource group selection
Show-Menu -Title 'Resource Group' -firstchoice 'ARM-ubuntu' -secondchoice 'ARM-2019Core'
$selection = Read-Host "Please make a selection"
switch ($selection)
 {
     '1' {
         Write-host -ForegroundColor RED 'Resourcegroup will be ARM-ubuntu'
         $resourcegroup = 'ARM-ubuntu'

     } '2' {
         Write-host -ForegroundColor RED 'Resourcegroup will be ARM-2019Core'
         $resourcegroup = 'ARM-2019Core'
     } 'q' {
         return
     }
 }

#menu choice for ARM template selection
Show-Menu -Title 'ARM Template' -firstchoice 'ubuntu' -secondchoice '2019-core'
$selection = Read-Host "Please make a selection"
switch ($selection)
 {
     '1' {
         Write-host -ForegroundColor RED 'template will be ubuntu'
         Write-host -ForegroundColor Blue -BackgroundColor White 'Template is being deployed to Azure'
         $template = 'https://raw.githubusercontent.com/petertayloruk/Azure/main/basicubuntu.json'

     } '2' {
         Write-host -ForegroundColor RED 'template will be 2019-core'
         $template = 'https://raw.githubusercontent.com/petertayloruk/Azure/main/2019small.json'
     } 'q' {
         return
     }
 }
#deploy resource from template
New-AzResourceGroupDeployment -ResourceGroupName $resourcegroup -Templateuri $template





