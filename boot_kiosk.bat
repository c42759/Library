:: kill explorer
taskkill /f /im explorer.exe

:: run kiosk chrome
"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" localhost --kiosk --incognito --disable-pinch --overscroll-history-navigation=0

:: run explorer after shutdown kiosk
explorer.exe
