<div class="grid grid-cols-2 gap-3">
  <div class="pt-1">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input type="text" name="email_joki" id="email_joki" class="custom-input block w-full" value="" placeholder="Ketikan Email" required>
  </div>
  <div>
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
    <input type="text" name="password_joki" id="password_joki" value="" placeholder="Ketikan Password" class="custom-input block w-full" required>
  </div>
  <div>
    <label for="login" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Login</label>
    <select class="custom-input block w-full" id="login_joki" name="login_joki" required>
      <option value="">Pilih Login</option>
      <option value="Moonton">Moonton</option>
      <option value="Facebook">Facebook</option>
      <option value="VK">VK</option>
      <option value="Tiktok">Tiktok</option>
    </select>
  </div>
  <div>
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Request Ke Penjoki</label>
    <input type="text" name="request_joki" id="request_joki" value="" placeholder="Ketikan Request Ke Penjoki" class="custom-input block w-full" required>
  </div>
  <input type="hidden" name="uid" id="uid" value="joki">
  <input type="hidden" name="server" id="server" value="joki">
</div>