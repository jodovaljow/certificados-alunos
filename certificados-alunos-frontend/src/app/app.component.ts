import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { EMPTY } from 'rxjs';
import { catchError } from 'rxjs/operators';

import { AuthService } from './shared/auth.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {

  constructor(
    private authService: AuthService,
    private router: Router,
  ) {

    // TODO: FIX: REMOVE
    this.authService.info()
      .pipe(
        catchError(
          error => {

            this.router.navigate(['/login'])

            return EMPTY
          }
        ),
      )
      .subscribe()
  }
}
