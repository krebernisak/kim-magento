#!/usr/bin/env python
# -*- coding: utf-8 -*-

column_names = []

def urlify(s):

     # Remove all non-word characters (everything except numbers and letters)
     s = re.sub(r"[^\w\s]", '', s)

     # Replace all runs of whitespace with a single dash
     s = re.sub(r"\s+", '-', s)

     return s

def resolveColumn(x):
    return {
        'sku': 'uid',
        'name': 'name',
        '_category': 'categoryName',
        'price': 'price',
        'description': 'description',
    }.get(x, False)

import sys
import json

# Get the total number of args passed to the demo.py
total = len(sys.argv)

# Get the arguments list
cmdargs = str(sys.argv)

# Print it
print ("The total numbers of args passed to the script: %d " % total)
print ("Args list: %s " % cmdargs)

# Read attributes list and default procuct template
magento_prod_template = open(sys.argv[2], 'r')
columns = magento_prod_template.readline().strip()
template = magento_prod_template.readline().strip().split(',')
magento_prod_template.close()

# Write attributes list as first column
magento_prod_import = open(sys.argv[3], 'w')
magento_prod_import.write(columns + '\n')
columns = columns.split(',')
N = len(columns)

index = 0
ga_prod = open(sys.argv[1], 'r')
for line in ga_prod:
    index += 1
    ga_p = json.loads(line)
    #magento_p = ['' for x in range(N)]
    magento_p = list(template)
    for i in range(0, N):
        key = resolveColumn(columns[i])
        if key:
            value = ga_p[key]
            if not value:
                continue
            elif key == 'categoryName':
                if index < 181:
                    value = 'Didaktika/' + value
                elif index < 222:
                    value = 'Oprema/' + value
                else:
                    value = 'Likovni materijal/' + value
        elif columns[i] == '_type':
            value = 'simple'
        elif columns[i] == 'url_key':
            value = ga_p['name']
        elif columns[i] == 'url_path':
            value = ga_p['name'] + '.html'
        else:
            continue

        if isinstance(value, basestring):
            value = '"' + value.encode('utf-8') + '"'
        magento_p[i] = str(value)
    magento_prod_import.write(','.join(magento_p) + '\n')

ga_prod.close()
magento_prod_import.close()