  

  <?php include 'config/config.php'; ?>

<?php include 'components/layout/header.php'; ?>
  <?php include 'components/layout/sidebar.php'; ?>
   
    <div class="flex flex-col flex-1 w-full">
     <?php include 'components/layout/topbar.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class=" px-6 pb-10 mx-auto ">
<div class="flex justify-between items-center">
<?php

if (isset($_COOKIE['vendor'])) {
  $userData = json_decode($_COOKIE['vendor'], true);
} else {
  $userData = [];
}

$data['id'] = $userData['id'];
$response = getReferralData($data);
$earned = 0;
if(isset($response) && count($response) > 0){
foreach($response as $referral){
   if($referral['status'] == 'Complete'){
    $earned += 5;
   }
}
}

?>

<h1 class="text-3xl font-bold my-6 tracking-tight neon-red-header">
            Referrals
          </h1>
         <button id="inviteButton" class="bg-primary-color text-white py-2 px-4 rounded-lg transition-colors duration-200 flex items-center">
           <i class="fas fa-user-plus mr-2"></i> Invite
         </button>
         </div>

         <!-- Referral Code Section -->
         <div class="mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
           <h3 class="text-lg font-medium text-gray-700 dark:text-white mb-4">Your Referral Code</h3>
           <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Share this code with others to earn rewards when they sign up using your referral link.</p>
           
           <div class="flex items-center">
             <div class="relative flex-1">
               <input 
                 type="text" 
                 id="referralCode" 
                 readonly 
                 value="https://stretchxlfreight.com/vendor/register.php?ref=<?php echo $userData['id']; ?>" 
                 class="w-full px-4 py-3 pr-12 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white"
               >
               <button 
                 id="copyReferralBtn" 
                 class="absolute right-2.5 top-1/2 -translate-y-1/2 p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                 title="Copy to clipboard"
               >
                 <i class="far fa-copy"></i>
               </button>
             </div>
             <button 
               id="copyButton" 
               class="ml-2 px-4 py-3 bgBlue text-white rounded-r-lg transition-colors duration-200 flex items-center"
             >
               <i class="fas fa-copy mr-2"></i> Copy
             </button>
           </div>
           
           <div id="copySuccess" class="mt-2 text-sm text-green-600 dark:text-green-400 hidden">
             <i class="fas fa-check-circle mr-1"></i> Copied to clipboard!
           </div>
         </div>
         <div>
          <div class="flex items-center justify-between">
          <h1 class="text-3xl font-bold my-6 tracking-tight neon-red-header">
            All Referrals
          </h1>
          <p class="text-lg font-semibold text-gray-700 dark:text-white">Earned: <?php echo $earned; ?></p>
          </div>
          <div class="flex flex-wrap gap-4">
            <?php
            if(isset($response) && count($response) > 0){
                foreach($response as $referral){
                    ?>
                    <div class="bgBlue dark:bg-gray-800 rounded-lg shadow-md p-6 w-[fit-content] flex flex-col gap-2">
                        <p class="text-lg text-white">Email: <?php echo $referral['email']; ?></p>
                        <p class="text-lg text-white">Status: <?php echo $referral['status']; ?></p>
                        <?php if($referral['status'] == 'incomplete') { ?>
                        <p class="text-sm text-white">You will get reward when your referral complete profile</p>
                        <?php }else{
                          ?>
                          <p class="text-sm text-green-500">Earned: $5</p>
                        <?php } ?>
                    </div>
                    <?php
                }
            }
            ?>
          </div>
        </div>
        </div>
        
      </main>
    </div>
  </div>
 <script>
  // Copy to clipboard function
  async function copyToClipboard(text, successElement) {
    try {
      await navigator.clipboard.writeText(text);
      if (successElement) {
        successElement.classList.remove('hidden');
        setTimeout(() => {
          successElement.classList.add('hidden');
        }, 2000);
      }
      return true;
    } catch (err) {
      console.error('Failed to copy text: ', err);
      return false;
    }
  }

  // Copy button click handler
  $(document).on('click', '#copyButton, #copyReferralBtn', async function(e) {
    e.preventDefault();
    const referralCode = document.getElementById('referralCode');
    const copySuccess = document.getElementById('copySuccess');
    await copyToClipboard(referralCode.value, copySuccess);
  });

  // Invite button click handler
  $(document).on('click', '#inviteButton', function() {
    const referralCode = document.getElementById('referralCode').value;
    const referralLink = `https://stretchxlfreight.com/vendor/register.php?ref=<?php echo $userData['id']; ?>`;
    
    Swal.fire({
      title: 'Invite Friends',
      html: `
        <p class="mb-4 text-gray-700 dark:text-gray-300">Share your referral link with friends and earn rewards!</p>
        <div class="relative">
          <input 
            type="text" 
            id="referralLink" 
            readonly 
            value="${referralLink}" 
            class="w-full px-4 py-3 pr-10 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:text-white text-sm"
          >
          <button 
            id="copyLinkBtn" 
            class="absolute right-2.5 top-1/2 -translate-y-1/2 p-2 neon-blue-header "
            style="position: absolute;"
            title="Copy to clipboard"
          >
            <i class="far fa-copy"></i>
          </button>
        </div>
        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Anyone who signs up with this link will be added to your referrals.</p>
      `,
      showCancelButton: true,
      confirmButtonText: 'Copy Link',
      cancelButtonText: 'Close',
      showCloseButton: true,
      showConfirmButton: false,
      didOpen: () => {
        // Add click handler for the copy button inside the modal
        document.getElementById('copyLinkBtn').addEventListener('click', async () => {
          const linkInput = document.getElementById('referralLink');
          const copied = await copyToClipboard(linkInput.value);
          
          if (copied) {
            const copyBtn = document.getElementById('copyLinkBtn');
            const originalHtml = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fas fa-check"></i>';
            copyBtn.classList.add('text-green-500');
            
            setTimeout(() => {
              copyBtn.innerHTML = originalHtml;
              copyBtn.classList.remove('text-green-500');
            }, 2000);
          }
        });
      }
    });
  });
 </script>
</body>
</html>
