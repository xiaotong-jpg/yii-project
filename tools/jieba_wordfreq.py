#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Simple helper that reads a text file and outputs JSON word frequencies using jieba.
Usage: python jieba_wordfreq.py input.txt
"""
import sys
import json
import re
import io, contextlib

try:
    # suppress jieba startup prints by temporarily redirecting stdout
    with contextlib.redirect_stdout(io.StringIO()):
        import jieba
except Exception as e:
    sys.stderr.write('ERROR: jieba not installed: ' + str(e) + '\n')
    sys.exit(2)

if len(sys.argv) < 2:
    sys.stderr.write('Usage: jieba_wordfreq.py input.txt\n')
    sys.exit(2)

path = sys.argv[1]
try:
    with open(path, 'r', encoding='utf-8') as f:
        text = f.read()
except Exception as e:
    sys.stderr.write('ERROR reading file: ' + str(e) + '\n')
    sys.exit(2)

# basic cleanup
text = re.sub(r"https?://\S+", " ", text)
text = re.sub(r"[\r\n]+", " ", text)
text = re.sub(r"\s+", " ", text)

# small stopword set (extend as needed)
stopwords = set(["的","了","在","是","和","与","也","就","都","而","你","我","他","她","它","我们","你们","他们","她们","它们","有","没有","为","对","与","等"])

with contextlib.redirect_stdout(io.StringIO()):
    words = list(jieba.cut(text, cut_all=False))
freq = {}
for w in words:
    w = w.strip()
    if not w:
        continue
    # skip purely numeric or punctuation
    if re.match(r"^[\d\W_]+$", w):
        continue
    # skip stopwords
    if w in stopwords:
        continue
    # skip single-character stopwords; allow single chinese characters that are not stopwords? here require length>=2 to reduce noise
    if len(w) < 2:
        continue
    freq[w] = freq.get(w, 0) + 1

# sort and output top 500
items = sorted(freq.items(), key=lambda x: x[1], reverse=True)[:500]
out = {k: v for k, v in items}
print(json.dumps(out, ensure_ascii=False))
