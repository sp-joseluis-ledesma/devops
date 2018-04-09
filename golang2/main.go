package main

import (
	"fmt"
	"log"
	"net/http"
	"time"
)

func main() {
	start := time.Now()
	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		fmt.Fprintf(w, "Hello I'm golang2. My uptime is: %d", int(time.Since(start).Seconds()))
	})

	log.Fatal(http.ListenAndServe(":80", nil))
}
