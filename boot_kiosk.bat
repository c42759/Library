:: kill explorer
taskkill /f /im explorer.exe

:: run kiosk chrome
"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" localhost --kiosk --incognito --disable-pinch --overscroll-history-navigation=0

:: run explorer after shutdown kiosk
start explorer.exe

:: timeout press ctrl+c, y and Enter to stop
timeout /t 5

:: restart app
"C:\Users\Evoke\Desktop\boot_kiosk.bat"
