lines = IO.readlines(ARGV[0])

ohSplit = [[],[]]

lines.each { |line| 
	data = /^[\s]*#(0*)([\d]+)([a-zA-Z]*) ?- ?(.*)$/.match(line)
	oh = if data[1] == '' then 1 else 0 end
	ohSplit[oh] << {'number' => data[2], 'letter' => data[3], 'name' => data[4], 'line' => line}
}

ohSplit.map { |array|
	array.sort { |a,b|
		if a['number'].to_i == b['number'].to_i
			a['letter'] <=> b['letter']
		else
			a['number'].to_i <=> b['number'].to_i
		end
	}.each { |line| puts line['line'] }
}
