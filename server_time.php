
<?php
// Win CPU
//header('Content-Type: text/plain');
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
$wmi = new COM('WinMgmts:\\\\.');
		//$wmi = new COM('WinMgmts:\\\\.');
		$cpus = $wmi->InstancesOf('Win32_Processor');
		$cpuload = 0;
		$cpu_count = 0;
		foreach ($cpus as $key => $cpu) {
			$cpuload += $cpu->LoadPercentage;
			$cpu_count++;
		}
		



$res = $wmi->ExecQuery('SELECT FreePhysicalMemory,FreeVirtualMemory,TotalSwapSpaceSize,TotalVirtualMemorySize,TotalVisibleMemorySize FROM Win32_OperatingSystem');
		$mem = $res->ItemIndex(0);
		$memtotal = round($mem->TotalVisibleMemorySize / 1000000,2);
		$memavailable = round($mem->FreePhysicalMemory / 1000000,2);
		$memused = round($memtotal-$memavailable,2);
		// WIN CONNECTIONS
		$connections = shell_exec('netstat -nt | findstr :80 | findstr ESTABLISHED | find /C /V ""'); 
		$totalconnections = shell_exec('netstat -nt | findstr :80 | find /C /V ""');
		echo "data: CPULoad: {$cpuload}-\n";
		echo "data: TOT_MEM: {$memtotal}-\n";
		echo "data: AVAIL_MEM: {$memavailable}-\n";
		echo "data: MEM_USED: {$memused}\n\n";
	//echo 'data: {"cpuload":"{$cpu_count}","memtotal":"{$memtotal}"\n\n}';
?>